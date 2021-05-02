@extends('layouts.app')
@section('content')
    <div>
        <div class="card card-default">
            <div class="card-header">
                Update profile
            </div>
            <div class="card-body">
                <form action="{{route('users.update', $user->id)}}" method='post'>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">About</label>
                        <input id="about" type="hidden" value="{{old('about', $user->about)}}" name="about">
                        <trix-editor input="about" ></trix-editor>
                    </div>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection
