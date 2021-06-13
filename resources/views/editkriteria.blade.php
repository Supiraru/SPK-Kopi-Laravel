@extends('layout.master')
@section('title', 'Kriteria | SPK Coffee')
@section('konten')

<div class="container animated fadeIn">
    <div class="row justify-content-center mt-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-white h5 bg-secondary">
                    Edit Kriteria
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="md-form">
                            <label for="kriteria">Kriteria</label>
                            <input class="form-control" value="{{ $kriteria->kriteria }}" type="text" name="kriteria" id="kriteria" required>
                        </div>
                        <div class="md-form">
                            @if ($kriteria->tipe == 'cost')
                                <div class="custom-control custom-radio ">
                                    <input class="custom-control-input" type="radio" id="cost" name="tipe" value="cost" checked>
                                    <label class="custom-control-label" for="cost">Cost</label>
                                </div>
                                <div class="custom-control custom-radio ">
                                    <input class="custom-control-input" type="radio" id="benefit" name="tipe" value="benefit">
                                    <label class="custom-control-label" for="benefit">Benefit</label>
                                </div>    
                            @else
                                <div class="custom-control custom-radio ">
                                    <input class="custom-control-input" type="radio" id="cost" name="tipe" value="cost" >
                                    <label class="custom-control-label" for="cost">Cost</label>
                                </div>
                                <div class="custom-control custom-radio ">
                                    <input class="custom-control-input" type="radio" id="benefit" name="tipe" value="benefit" checked>
                                    <label class="custom-control-label" for="benefit">Benefit</label>
                                </div>
                            @endif
                        </div>
        
                        <div class="md-form">
                            <label for="bobot">Bobot</label>
                            <input class="form-control" value="{{ $kriteria->bobot }}" type="number" name="bobot" id="bobot" required>
                            @error('bobot')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div id ='dynamic-form'>
                            <h1>
                                sub kriteria
                            </h1>
                            @foreach ($sub_kriteria as $item)
                            <div>
                                <input type="text" name="pilihan[{{ $loop->index+1 }}]" id="input-pilihan-{{ $loop->index+1 }}" value="{{ $item->sub_kriteria }}" required >
                                <input type="number" name="nilai[{{ $loop->index+1 }}]" id="input-nilai-{{ $loop->index+1 }}" value="{{ $item->value }}" required > 
                                <button class="remove-input-field">Remove</button> 
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-kriteria">
                            add kriteria
                        </button>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-secondary" type="submit">Tambah Data Kriteria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    var counter = 0;
        $("#add-kriteria").click(function () {
            console.log("tst")
            ++counter;
            $("#dynamic-form").append(`<div><input type="text" name="pilihan[${counter}]" id="input-pilihan-${counter}" value="" required > <input type="number" name="nilai[${counter}]" id="input-nilai-${counter}" value="" required > <button class="remove-input-field">Remove</button> </div>`
                );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parent('div').remove();
        });
    </script>
@endpush