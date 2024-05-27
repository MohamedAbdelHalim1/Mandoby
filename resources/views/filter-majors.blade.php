<div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-10 table-responsive bg-white rounded-3 pt-3 pb-3">
                                <table class="table table align-middle" id="facultyTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">اسم التخصص</th>
                                            <th scope="col">الكليه</th>
                                            <th scope="col">الجامعه</th>
                                            <th scope="col">المؤهلات</th>
                                            <th scope="col">متوقفه حاليا</th>
                                            <th scope="col">اخري</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($filteredData)>0)
                                        @foreach($filteredData as $major)
                                        <tr>
                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td>{{$major->name}} </td>
                                            <td>{{$major->faculty->name}} </td>
                                            <td>{{$major->faculty->university->name}}</td>
                                            <td>
                                                {{$major->qualification}}
                                            </td>
                                            <td>@if($major->is_active == 0)
                                                    نعم
                                                @else
                                                    لا
                                                @endif 
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="ms-2">
                                                    <button type="button" class="btn text-white button-modal2"
                                                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal" onclick="openEditModal({{ $major->id }})"
                                                            style="background-color: #1C7A36;">تعديل</button>
                                                    </div>
                                                    <div>
                                                    <button type="button" class="btn text-white" onclick="deleteMajor({{ $major->id }})"
                                                            style="background-color: #7A1C1C;">مسح</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <h3 style="text-align:center;"> لا يوجد تخصص </h3>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>