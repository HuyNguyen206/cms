
@extends('layouts.app')
@section('content')
    <div>
        <div class="card card-default">
            <div class="card-header">
                Edit setting
            </div>
            <div class="card-body">
                <form action="{{route('settings.update', $setting->id)}}" method='post'>
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Site name</label>
                        <input type="text" value="{{old('site_name', $setting->site_name)}}" name="site_name" class="form-control @error('name') is-invalid @enderror">
                        @error('site_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" value="{{old('site_address', $setting->site_address)}}" name="site_address" class="form-control @error('site_address') is-invalid @enderror">
                        @error('site_address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Contact phone</label>
                        <input type="text" value="{{old('contact_phone', $setting->contact_phone)}}" name="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror">
                        @error('contact_phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Contact email</label>
                        <input type="text"  value="{{old('contact_email', $setting->contact_email)}}"name="contact_email" class="form-control @error('contact_email') is-invalid @enderror">
                        @error('contact_email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection


