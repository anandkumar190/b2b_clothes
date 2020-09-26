                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom01">Price Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Price name" id="price_name" name="price_name" value="{{$data->price_name}}" required>
                                                        <div class="valid-feedback">
                                                            Done !!
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom01">Price Rate</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Price rate" id="price_rate" name="price_rate" value="{{$data->price_rate}}" required>
                                                        <div class="valid-feedback">
                                                            Done !!
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