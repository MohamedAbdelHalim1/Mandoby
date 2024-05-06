
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 table-responsive bg-white rounded-3 pt-3 pb-3">
                <table class="table table align-middle" id="facultyTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم الكلية</th>
                            <th scope="col">اسم الجامعه</th>
                            <th scope="col">نسبة القبول</th>
                            <th scope="col">اخري</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($filteredData)>0)
                        @foreach($filteredData as $faculty)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$faculty->name}} </td>
                            <td>{{$faculty->university->name}} </td>
                            <td>
                                {{$faculty->degree}} %
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="ms-2">
                                        <button type="button" class="btn text-white" 
                                            style="background-color: #1C7A36;">تعديل</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn text-white" onclick="deleteFaculty({{ $faculty->id }})"
                                            style="background-color: #7A1C1C;">مسح</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <h3 style="text-align:center;"> NO Faculties Found </h3>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    