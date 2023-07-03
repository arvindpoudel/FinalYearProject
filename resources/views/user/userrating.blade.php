<div>
<table class="table" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Items</th>
                          <th>Genres</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->genre}}</td>
                                <td>
                                
                                <button type="submit" class="btn btn-primary" ><a href="">Rate</a></button> 
         
                                </td>
                            </tr>
                        @endforeach
                        
                        
            
                        
                      </tbody>
                    </table>

</div>