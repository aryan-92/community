@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Family Information</h3>
            </div>
            <div class="card-body">
                <h5 class="text-primary mb-3"><u>A). Add Head Member</u></h5>
                <form action="{{ route('addMember') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label">Birthday</label>
                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
                            @error('birthday')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">mobile no</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">State</label>
                            <select name="state" id="state" class="form-control @error('state') is-invalid @enderror">
                                <option value="">select state</option>
                                @foreach ($state as $item)
                                    <option value="{{ $item->id }}" {{ old('state') == $item->id ? 'selected' : '' }}>{{ $item ->name }}</option>
                                @endforeach

                            </select>
                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">City</label>
                            <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                <option value="">select City</option>
                                @foreach ($city as $item)
                                    <option value="{{ $item->id }}" {{ old('city') ==  $item->id  ? 'selected' : '' }}>{{ $item->name }}d</option>
                                @endforeach
                            </select>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Pincode</label>
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" id="pincode" name="pincode" value="{{ old('pincode') }}">
                            @error('pincode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Marital Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marital_status" id="inlineMarried" value="m"
                                        @if(old('marital_status') == 'm') checked @endif>
                                    <label class="form-check-label" for="inlineMarried">Married</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="marital_status" id="inlineUnMarried" value="um"
                                        @if(old('marital_status') == 'um') checked @endif>
                                    <label class="form-check-label" for="inlineUnMarried">Unmarried</label>
                                </div>
                            </div>

                            @error('marital_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wedDate" id="wedDate">
                                <label class="form-label">Enter Wedding Date</label>
                                <input type="date" class="form-control @error('wedDate') is-invalid @enderror" id="wedDate" name="wedDate" value="{{ old('wedDate') }}">
                            </div>
                            @error('wedDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <textarea name="address" id="" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hobbies</label>
                            <div id="hobbiesContainer">

                                <div class="row mb-2">
                                    <div class="col-8">
                                        <input type="text" id="hobbies1" class="form-control @error('hobbies.0') is-invalid @enderror" name="hobbies[]" value="{{ old('hobbies.0') }}">
                                        @error('hobbies.0')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-outline-success addHob">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                        <button type="button" class="btn btn-outline-danger removeHob"
                                            style="display:none;">
                                            <i class="fas fa-times"></i> Remove
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="formFile" class="form-label">Upload Photo</label>
                            <input class="form-control @error('headPhoto') is-invalid @enderror" type="file" name="headPhoto" id="formFile">
                            @error('headPhoto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <h5 class="text-primary mt-5 mb-3"><u>B). Add Family Member</u></h5>

                    <div id="FamilyMemberContainer">
                        <!-- Initial Family Member -->
                        <div class="FamilyMember row mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="MemName1" name="MemName">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Birthday</label>
                                <input type="date" id="Membirthday1" class="form-control" name="Membirthday">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Marital Status</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input famMaritalStatus" type="radio"
                                            name="FamMaritalStatus" value="m">
                                        <label class="form-check-label" for="inlineMarried2">Married</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input famMaritalStatus" type="radio"
                                            name="FamMaritalStatus"  value="um">
                                        <label class="form-check-label" for="inlineUnMarried2">Unmarried</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wedDate2" id="wedDate2_0" style="display:none;">
                                    <label class="form-label">Enter Wedding Date</label>
                                    <input type="date" class="form-control" id="MemwedDate2" name="MemwedDate2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Education</label>
                                <textarea name="MemEdu" id="MemEdu1" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Upload Member Photo</label>
                                <input class="form-control" id="MemPhoto1" type="file" name="MemPhoto">
                                <input type="hidden" name="hidMemPho" id="hidMemPho" value="">
                            </div>
                        </div>



                        <hr>
                        <button type="button" class="btn btn-outline-success" id="addMore">Add More</button>
                    </div>
                    <table id="FamMemTable" class="table table-striped">
                        <thead>
                          <tr>
                              <th>Name</th>
                              <th>Birthday</th>
                              <th>Marital Status</th>
                              <th>wedding date</th>
                              <th>Education</th>
                              <th>photo</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody class="addFamMem">

                        </tbody>
                      </table>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#wedDate').hide();
            $('#wedDate2').hide();
            $('#inlineMarried').change(function() {
                if ($(this).is(':checked')) {
                    $('#wedDate').show();
                }
            });

            $('#inlineUnMarried').change(function() {
                if ($(this).is(':checked')) {
                    $('#wedDate').hide();
                }
            });
            $('#inlineMarried2').change(function() {
                if ($(this).is(':checked')) {
                    $('#wedDate2').show();
                }
            });

            $('#inlineUnMarried2').change(function() {
                if ($(this).is(':checked')) {
                    $('#wedDate2').hide();
                }
            });

            // add more hobbies


            $('#hobbiesContainer').on('click', '.addHob', function() {
                var newRow = $('#hobbiesContainer .row:first').clone();
                newRow.find('input').val('');
                newRow.find('.addHob').hide();
                newRow.find('.removeHob').show();
                //var index = $('.hobbiesContainer .row').length;
                //newRow.find('input[type="text"]').attr('id', 'hobbies' + (index + 1));
                var newIndex = $('#hobbiesContainer .row').length;
                newRow.find('input[type="text"]').attr('id', 'hobbies' + (newIndex + 1));
                $('#hobbiesContainer').append(newRow);
                // Add validation rules for the new hobby input
                // var newIndex = $('#hobbiesContainer .row').length - 1;
                // $('input[name="hobbies[]"]').eq(newIndex).rules('add', {
                //     required: true,
                //     messages: {
                //         required: "Please enter the new hobby"
                //     }
                // });
            });


            $('#hobbiesContainer').on('click', '.removeHob', function() {
                $(this).closest('.row').remove();
                $("form").valid();
            });

            // add family member

            $(document).on('change', '.famMaritalStatus', function() {
                var container = $(this).closest('.FamilyMember');
                var wedDate2 = container.find('.wedDate2');

                if ($(this).val() === 'm') {
                    wedDate2.show();
                } else {
                    wedDate2.hide();
                }
            });

            // Add family member
            //add phd student organisation details
        var countfamilymember = 1;
        var counterfamilymember = 0;
        $(document).ready(function() {
            $('#addMore').click(function(e) {
                e.preventDefault();

                var name = $('#MemName1').val();
                var birthday = $('#Membirthday1').val();
                var maritalStatus = $("input[name='FamMaritalStatus']:checked").val();
                if(maritalStatus == 'm'){
                   var MS = 'Married';
                }else if(maritalStatus == 'um'){
                    var MS = 'UnMarried'
                }else{
                    var MS = '';
                }
                //alert(maritalStatus);
                var memwedDate = $('#MemwedDate2').val();
                var education = $('#MemEdu1').val();
                var photo = $('#hidMemPho').val();






                    var newRow = '<tr>' +
                        '<td>' + name +
                        '<input type="hidden" name="MemName[]" value="' +
                        name + '"></td>' +
                        '<td>' + birthday +
                        '<input type="hidden" name="Membirthday[]" value="' +
                        birthday + '"></td>' +
                        '<td>' + MS +
                        '<input type="hidden" name="FamMaritalStatus[]" value="' +
                        maritalStatus + '"></td>' +
                        '<td>' + memwedDate +
                        '<input type="hidden" name="MemwedDate2[]" value="' +
                        memwedDate + '"></td>' +
                        '<td>' + education +
                        '<input type="hidden" name="MemEdu[]" value="' +
                        education + '"></td>' +
                        '<td> <img  src="' + photo + '" style="max-width:100px;"><input type="hidden" name="hidMemPho[]" value="' + photo + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counterfamilymember + '">Remove</button></td></tr>';
                    $('.addFamMem').append(newRow);
                    $('#MemName1').val('');
                    $('#Membirthday1').val('');

                    $('#MemwedDate2').val('');
                    $('#MemEdu1').val('');
                    $('#MemPhoto1').val('');
                    $('#hidMemPho').val('');
                    countfamilymember++;
                    counterfamilymember++;

            });

            $(".addFamMem").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterfamilymember--;
                countfamilymember--;
            });
        });
        });
    </script>



    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>

    <script>
        $(document).ready(function() {

            $("form").validate({
                rules: {
                    name: "required",
                    surname: "required",
                    birthday: {
                        required: true,
                        date: true,
                        validateAge: true // Custom validation rule
                    },
                    phone: {
                        required: true,
                        number: true,
                        minlength: 10, // Adjust the minimum length as needed
                        maxlength: 10 // Adjust the maximum length as needed
                    },
                    pincode: {
                        required: true,
                        number: true,
                        minlength: 6, // Adjust the minimum length as needed
                        maxlength: 6 // Adjust the maximum length as needed
                    },

                    state: "required",
                    city: "required",

                    marital_status: "required",
                    address: "required",
                    wedDate: "required",
                    headPhoto: "required",
                    "hobbies[]": "required",
                    //MemName: "required",
                    MemName: {
                required: {
                    depends: function(element) {
                        // Check if .addFamMem table has data
                        return $('.addFamMem tr').length === 0;
                    }
                }
            },
                Membirthday: {
                required: {
                    depends: function(element) {
                        // Check if .addFamMem table has data
                        return $('.addFamMem tr').length === 0;
                    }
                }
            },
                FamMaritalStatus: {
                required: {
                    depends: function(element) {
                        // Check if .addFamMem table has data
                        return $('.addFamMem tr').length === 0;
                    }
                }
            },

                    MemEdu: {
                required: {
                    depends: function(element) {
                        // Check if .addFamMem table has data
                        return $('.addFamMem tr').length === 0;
                    }
                }
            },
                    MemPhoto: {
                required: {
                    depends: function(element) {
                        // Check if .addFamMem table has data
                        return $('.addFamMem tr').length === 0;
                    }
                }
            },


                },
                messages: {
                    name: "Please enter your name",
                    surname: "Please enter your surname",
                    birthday: {
                        required: "Please enter your birthday",
                        date: "Please enter a valid date",
                        validateAge: "You must be at least 21 years old"
                    },
                    // Add messages for other fields
                    // ...

                    // Dynamic validation messages for family members
                    MemName: "Please enter family member's name",
                    Membirthday: "Please enter family member's birthday",
                    // Add messages for other family member fields
                    // ...
                }

            });

            // Custom validation method for age
            $.validator.addMethod("validateAge", function(value, element) {
                var today = new Date();
                var birthDate = new Date(value);
                var age = today.getFullYear() - birthDate.getFullYear();

                if (age > 21 || (age === 21 && today.getMonth() > birthDate.getMonth())) {
                    return true;
                }

                return false;
            }, "You must be at least 21 years old");
        });
    </script>

    <script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#MemPhoto1', function() {
            //console.log('thumb upload');
            var name = document.getElementById("MemPhoto1").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("MemPhoto1").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('MemPhoto1').files[0]);

            $.ajax({
                url: "{{ route('uploadMemberPhoto') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);

                    $('#hidMemPho').val(data.img_path);


                }
            });

        });
    </script>

<script>
     $(document).ready(function () {
        // When the state dropdown changes
        $('#state').on('change', function () {
            var stateId = $(this).val();

            // Make an AJAX request to get cities based on the selected state
            $.ajax({
                url: '/get-cities/' + stateId,
                type: 'GET',
                success: function (data) {
                    // Clear existing options in the city dropdown
                    $('#city').empty();

                    // Append the default "Select City" option
                    $('#city').append($('<option>', {
                        value: '',
                        text: 'Select City'
                    }));

                    // Append new options based on the received data
                    $.each(data, function (key, value) {
                        $('#city').append($('<option>', {
                            value: value.id,
                            text: value.name
                        }));
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Error fetching cities: ' + textStatus);
                }
            });
        });
    });
</script>
@endsection
