@extends('admin.master')
@section('content')
@section('content')
    <div class="container-fluid pt-4">

        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body position-relative p-4">
                        <button type="button" class="btn-close border-0 bg-transparent"
                            style="position: absolute; right: 5px; top: 5px;" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-x text-white"></i>
                        </button>

                        <!-- Update Form -->
                        <form id="updateForm" method="POST" action="{{ url('admin/update-setings') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <!-- Hidden input for ID -->
                            <input type="hidden" name="id" id="updateId">

                            <!-- Logo (File Upload) -->
                            <div class="mb-3">
                                <img src="/{{ $contact->logo }}" alt="" id="imagePreview" style="height: 80px;"
                                    class="img-fluid"> <br>
                                    
                                <label for="logo" class="form-label">Logo</label>

                                <input type="file" class="form-control" id="imageInput" name="logo">
                                @error('logo')
                                    <div class="text-danger">{{ $logo }}</div>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ old('name', $contact->name) }}"
                                    id="name" name="name" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $contact->address) }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $address }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{ old('phone', $contact->phone) }}"
                                    id="phone" name="phone">
                                @error('phone')
                                    <div class="text-danger">{{ $phone }}</div>
                                @enderror
                            </div>

                            <!-- Telephone -->
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Telephone</label>
                                <input type="text" class="form-control" id="telephone"
                                    value="{{ old('telephone', $contact->telephone) }}" name="telephone">
                                @error('telephone')
                                    <div class="text-danger">{{ $telephone }}</div>
                                @enderror
                            </div>

                            <!-- Primary Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ old('email', $contact->email) }}" name="email" required>
                                @error('email')
                                    <div class="text-danger">{{ $email }}</div>
                                @enderror
                            </div>

                            <!-- Secondary Email -->
                            <div class="mb-3">
                                <label for="email_two" class="form-label">Secondary Email</label>
                                <input type="email" class="form-control" id="email_two"
                                    value="{{ old('email_two', $contact->email_two) }}" name="email_two">
                                @error('email_two')
                                    <div class="text-danger">{{ $email_two }}</div>
                                @enderror
                            </div>

                            <!-- Facebook -->
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook"
                                    value="{{ old('facebook', $contact->facebook) }}" name="facebook">
                                @error('facebook')
                                    <div class="text-danger">{{ $facebook }}</div>
                                @enderror
                            </div>

                            <!-- WhatsApp -->
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                <input type="text" class="form-control" id="whatsapp"
                                    value="{{ old('whatsapp', $contact->whatsapp) }}" name="whatsapp">
                                @error('whatsapp')
                                    <div class="text-danger">{{ $whatsapp }}</div>
                                @enderror
                            </div>

                            <!-- Twitter -->
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter"
                                    value="{{ old('twitter', $contact->twitter) }}" name="twitter">
                                @error('twitter')
                                    <div class="text-danger">{{ $twitter }}</div>
                                @enderror
                            </div>

                            <!-- Instagram -->
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram"
                                    value="{{ old('instagram', $contact->instagram) }}" name="instagram">
                                @error('instagram')
                                    <div class="text-danger">{{ $instagram }}</div>
                                @enderror
                            </div>

                            <!-- LinkedIn -->
                            <div class="mb-3">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin"
                                    value="{{ old('linkedin', $contact->linkedin) }}" name="linkedin">
                                @error('linkedin')
                                    <div class="text-danger">{{ $linkedin }}</div>
                                @enderror
                            </div>

                            <!-- About Us -->
                            <div class="mb-3">
                                <label for="about_us" class="form-label">About Us</label>
                                <textarea class="form-control" id="about_us" name="about_us" rows="4">{{ old('about_us', $contact->about_us) }}</textarea>
                                @error('about_us')
                                    <div class="text-danger">{{ $about_us }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <h4 class="card-title">Static</h4>
                            <button type="button" class="btn btn-info   m-l-15 text-white" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i class="fa-solid fa-pen-circle"></i> Edit</button>
                        </div>

                        <table class="table table-dark table-striped">
                            <tr class="thead">
                            <tr>
                                <th>
                                    <h3>Logo</h3>
                                </th>
                                <th>
                                    <a href="/{{$contact->logo}}"
                                        target="_blank"><img style="height: 80px;"
                                            src="/{{$contact->logo}}"
                                            alt="" class="img-fluid"></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>{{$contact->name}}</th>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <th>{{$contact->address}}</th>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <th>{{$contact->phone}}</th>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <th>{{$contact->telephone}}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{$contact->email}} <br> {{$contact->email_two}}</th>
                            </tr>
                            <tr>
                                <th>Facebook</th>
                                <th><a href="{{$contact->facebook}}">{{$contact->facebook}}</a> </th>
                            </tr>
                            <tr>
                                <th>Twitter</th>
                                <th><a href="{{$contact->instagram}}">{{$contact->instagram}}</a> </th>
                            </tr>
                            <tr>
                                <th>Instagram</th>
                                <th><a href="{{$contact->instagram}}">{{$contact->instagram}}</a> </th>
                            </tr>
                            <tr>
                                <th>Linkedin</th>
                                <th><a href="{{$contact->linkedin}}">{{$contact->linkedin}}</a> </th>
                            </tr>
                            <tr>
                                <th style="min-width: 20%">About us:</th>
                                <th>
                                    <p>{!! $contact->about_us !!}</p>
                                </th>
                            </tr>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        $(function() {
            // Initialize summernote
            $('.summernote').summernote({
                height: 350,
                focus: false,
            });
            $('.summernoteSmall').summernote({
                height: 150,
                focus: false,
            });

            // Image preview for the image input
            $('#imageInput').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });

            // Background image preview
            $('#backgroundImageInput').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#bgImagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
