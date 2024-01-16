@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card mb-5 mt-5">
            <div class="card-header">
                <h3>Head of the family {{ $memberDetails->name }} {{ $memberDetails->surname }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>

                    </thead>
                    <tbody>

                        <tr>
                            <th>Photo</th>
                            <td> <img src="/{{ $memberDetails->photo }}" alt="" style="max-width: 100px;"></td>

                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $memberDetails->name }} {{ $memberDetails->surname }}</td>

                        </tr>
                        <tr>
                            <th>Birthday</th>
                            <td>{{ $memberDetails->birthday }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $memberDetails->mobile_no }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $memberDetails->address }}</td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td>{{ $memberDetails->stateName->name }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $memberDetails->cityName->name }}</td>
                        </tr>
                        <tr>
                            <th>Pincode</th>
                            <td>{{ $memberDetails->pincode }}</td>
                        </tr>
                        <tr>
                            <th>Marital Status</th>
                            <td>{{ $memberDetails->marital_status == 'm' ? 'Married' : 'Unmarried' }}</td>
                        </tr>
                        <tr>
                            <th>Wedding Date</th>
                            <td>{{ $memberDetails->wedding_date == '' ? '' : $memberDetails->wedding_date }}</td>
                        </tr>
                        <tr>
                            <th>Hobbies</th>
                            <td>
                                <ul>
                                    @foreach ($hobbies as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>



        </div>

        <div class="card">
            <div class="card-header">
               <h3>Family Member List</h3>
            </div>
            <div class="card-body mb-5">
                <table id="FamMemTable" class="table table-striped">
                    <thead>
                      <tr>
                          <th>Sl.no</th>
                          <th>Name</th>
                          <th>Birthday</th>
                          <th>Marital Status</th>
                          <th>wedding date</th>
                          <th>Education</th>
                          <th>photo</th>
                      </tr>
                    </thead>
                    <tbody class="addFamMem">
                        @foreach ($subMember as $item)


                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->birthday }}</td>
                            <td>{{ $item->marital_status  == 'm' ? 'Married' : 'Unmarried' }}</td>
                            <td>{{ $item->wedding_date}}</td>
                            <td>{{ $item->education }}</td>
                            <td><img src="{{ asset($item->photo) }}" alt="" style="max-width: 100px;"></td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>



          </div>
    </div>
@endsection

@section('js')
@endsection
