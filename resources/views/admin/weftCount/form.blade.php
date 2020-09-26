                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom01">Weft Count</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Weft Count" name="weft_count" value="{{$data->weft_count}}" required>
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