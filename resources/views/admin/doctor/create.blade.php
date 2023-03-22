@extends('admin.layouts.main')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-edit bg-blue"></i>
                            <div class="d-inline">
                                <h5>Add Doctor</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../index.html"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>Doctor add form </h3>
                        </div>
                        <div class="card-body">
                            <form class="forms-sample" enctype="multipart/form-data" method="post"
                                action="{{ route('doctor.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">{{ __('Full Name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="exampleInputName1" placeholder="Name" name="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">{{ __('Email Address') }}</label>
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                                id="exampleInputEmail3" placeholder="Email" autocomplete="off">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">{{ __('Password') }}</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" id=""
                                                placeholder="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Gender</label>
                                            <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror"
                                                id="exampleSelectGender">
                                                <option value="">Please select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">{{ __('Highest Education') }}</label>
                                            <input type="text"
                                                class="form-control  @error('education') is-invalid @enderror"
                                                id="exampleInputPassword4" name="education" placeholder="education">
                                            @error('education')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">{{ __('Address') }}</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                id="exampleInputPassword4" name="address" placeholder="address">
                                            @error('address')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Specialist</label>
                                            <input type="text" name="department"
                                                class="form-control @error('department') is-invalid @enderror">
                                            @error('department')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone number</label>
                                            <input type="text" name="phone_number"
                                                class="form-control @error('phone_number') is-invalid @enderror">
                                            @error('phone_number')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image"
                                                class="form-control file-upload-info  @error('image') is-invalid @enderror"
                                                placeholder="Upload Image">

                                            @error('image')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Role</label>
                                        <select name="role_id"
                                            class="form-control  @error('role_id') is-invalid @enderror">
                                            <option value="">Please Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">{{ __('About') }}</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1"
                                            rows="4"name="description"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                                <button class="btn btn-light">Cancel</button>
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
