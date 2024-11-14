<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Feature;
use App\Models\WhyChoose;
use App\Models\KnowAboutUs;
use App\Models\FeaturesList;
use Illuminate\Http\Request;
use App\Models\ProductBenifits;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function banner()
    {
        $banner = Banner::first();
        return view('admin.pages.settings.home.banner-settings', compact('banner'));
    }
    public function banner_update(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=600,height=636',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=1100,height=500',
        ]);

        $imagePath = null;
        $bgImagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/banners'), $imageName);
            $imagePath = 'uploads/banners/' . $imageName;
        }

        if ($request->hasFile('background_image')) {
            $bgImage = $request->file('background_image');
            $bgImageName = time() . '_' . $bgImage->getClientOriginalName();
            $bgImage->move(public_path('uploads/banners'), $bgImageName);
            $bgImagePath = 'uploads/banners/' . $bgImageName;
        }

        $banner = Banner::first();

        $banner->title = $validatedData['title'];
        $banner->description = $validatedData['description'];
        $banner->image = $imagePath;
        $banner->background_image = $bgImagePath;
        $banner->save();

        return redirect('admin/banner-settings')->with('success', 'Banner updated successfully!');
    }

    public function WhyChooseus()
    {
        $wchoose = WhyChoose::first();
        return view('admin.pages.settings.home.WhyChooseus-settings', compact('wchoose'));
    }
    public function WhyChooseusUpdate(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'free_shipping' => 'nullable|string',
            'support' => 'nullable|string',
            'return' => 'nullable|string',
            'payment' => 'nullable|string',
        ]);

        // Find the existing "Why Choose" record (assuming only one record exists)
        $whyChoose = WhyChoose::first();

        // If no record exists, create a new one
        if (!$whyChoose) {
            $whyChoose = new WhyChoose();
        }

        // Update the record with validated data
        $whyChoose->update($validatedData);

        // Return a success message and redirect back
        return redirect()->back()->with('success', 'Why Choose information updated successfully!');
    }
    public function knowAboutus()
    {
        $benefit = ProductBenifits::Orderby('id', 'desc')->paginate(10);
        $data = KnowAboutUs::first();
        return view('admin.pages.settings.home.about-us-settings', compact('data', 'benefit'));
    }

    public function knowAboutusUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
        ]);

        $benefitData    = ProductBenifits::all();
        $data           = KnowAboutUs::first();
        $updatedata     = $data->update($validatedData);

        return redirect()->back()->with(
            [
                'message'   => 'Know About Us Is update',
                'data'      => $data,
                'benefit'   => $benefitData,
            ]
        );
    }

    public function abListupdate(Request $request)
    {
        $validatedData = $request->validate([
            'benifits' => 'required',
        ]);
        $benefit = ProductBenifits::create([
            'benifits' => $request->benifits,
        ]);
        $benefitData = ProductBenifits::orderBy('id', 'desc')->get();
        $data = KnowAboutUs::first();
        return redirect()->back()->with([
            'message' => 'Benefit added successfully',
            'data' => $data,
            'benefit' => $benefitData,
        ]);
    }

    public function deleteBenifits(Request $request)
    {
        $validatedData = $request->validate([
            'id' => "required",
        ]);
        $benefit = ProductBenifits::where('id', $request->id)->first();
        if ($benefit) {
            $benefit->delete();
            return redirect()->back()->with('success', 'Benefit deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Benefit not found');
        }
    }

    public function features()
    {
        $list = FeaturesList::Orderby('id', 'desc')->paginate(10);
        $feature = Feature::first();
        return view('admin.pages.settings.home.features', compact('list', 'feature'));
    }
    public function features_update(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'title'         =>  'required',
            'title_two'         =>  'required',
            'description'   =>  'required',
        ]);

        $feature = Feature::first();
        $feature->update($validatedData);
        $benefit = ProductBenifits::Orderby('id', 'desc')->get();
        $data = KnowAboutUs::first();
        return redirect()->back()->with('message', 'Features title update successfully');
    }
    public function store_features(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:1000',
            'image'         => 'required|mimes:jpg,png,svg',  // Validate image type and size (max 2MB)
        ]);
    
        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            FeaturesList::create([
                'title'         => $request->title,
                'description'   => $request->description,
                'image'         => 'uploads/' . $imageName,
            ]);
            return redirect()->back()->with('message', 'New feature added successfully!');
        } else {
            return redirect()->back()->with('message', 'Please upload an image.');
        }
    }
    public function deleteFeature(Request $request){
        $validatedData = $request->validate([
            'id' => "required",
        ]);
        $benefit = FeaturesList::where('id', $request->id)->first();
        if ($benefit) {
            $benefit->delete();
            return redirect()->back()->with([
                'success'=> 'Features deleted successfully',
                'message'=> 'Features deleted successfully',
            ]);
        } else {
            return redirect()->back()->with([
                'error'=> 'Features not found',
                'message'=> 'Features not found',
            ]);
        }
    }
    
}
