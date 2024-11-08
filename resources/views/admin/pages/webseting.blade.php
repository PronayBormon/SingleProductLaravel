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
          <button type="button" class="btn-clos border-0 bg-transparent" style="position: absolute; right: 5px; top: 5px;" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x text-white"></i></button>


          ...
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
                        <button type="button" class="btn btn-info   m-l-15 text-white" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pen-circle"></i> Edit</button>
                    </div>
                    
                    <table class="table table-dark table-striped">
                        <tr class="thead">
                            <tr>
                                <th>
                                    <h3>Logo</h3>
                                </th>
                                <th>
                                    <a href="http://127.0.0.1:8000/backend/assets/images/logo-light-text.png" target="_blank"><img src="http://127.0.0.1:8000/backend/assets/images/logo-light-text.png" alt="" class="img-fluid"></a>
                                </th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>FuturegenIT</th>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <th>Address 1, road number, Division, Country</th>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <th>+1223423434</th>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <th>+1210032482</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>yourmail@mail.com</th>
                            </tr>
                            <tr>
                                <th>Facebook</th>
                                <th><a href="http://127.0.0.1:8000/backend/assets/images/logo-light-text.png">http://127.0.0.1:8000/backend/assets/images/logo-light-text.png</a></th>
                            </tr>
                            <tr>
                                <th>Twitter</th>
                                <th><a href="http://127.0.0.1:8000/backend/assets/images/logo-light-text.png">http://127.0.0.1:8000/backend/assets/images/logo-light-text.png</a></th>
                            </tr>
                            <tr>
                                <th>Instagram</th>
                                <th><a href="http://127.0.0.1:8000/backend/assets/images/logo-light-text.png">http://127.0.0.1:8000/backend/assets/images/logo-light-text.png</a></th>
                            </tr>
                            <tr>
                                <th>Linkedin</th>
                                <th><a href="http://127.0.0.1:8000/backend/assets/images/logo-light-text.png">http://127.0.0.1:8000/backend/assets/images/logo-light-text.png</a></th>
                            </tr>
                            <tr>
                                <th style="min-width: 20%">About us:</th>
                                <th>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos nemo quas quibusdam tempora similique at iste nulla! Fugiat rerum fuga, adipisci numquam modi similique eveniet dolore, nisi maiores cumque minus consectetur totam rem possimus accusantium, ab libero consequuntur vitae perferendis? Laboriosam minus maiores non ipsum earum veniam nihil alias perspiciatis consectetur sequi, asperiores, dolores totam modi. Placeat excepturi quam facilis sit ratione accusantium repellat, distinctio reiciendis dolorum qui laborum aliquid iste, optio voluptatem animi dicta illum quisquam neque est. Aliquam non dicta cumque repudiandae officia quaerat voluptate deserunt aut minus quia, possimus nulla maiores corrupti, velit laudantium, sequi tempore dolore.</p>
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
@endsection