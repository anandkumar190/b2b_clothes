                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Color Name</label>
                                                                <input type="text" class="form-control" id="validationCustom01"
                                                                placeholder="Color name" name="color_name" value="{{$data->color_name}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Color Picker</label>
                                                                <input type="color" class="form-control"
                                                                placeholder="Color name" name="color_pick" value="{{$data->color_pick}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom02">Status</label>
                                                        <select name="is_active" id="validationCustom02" class="form-control">
                                                            <option value="" selected="true" disabled>Select</option>
                                                            @foreach($data->activeOptions() as $activeOptionkey => $activeOptionValue)
                                                                <option value="{{$activeOptionkey}}" {{$activeOptionValue == $data->is_active ? 'selected' : ''}}>{{$activeOptionValue}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Done !!
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Submit form</button>