                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom02">Category</label>
                                                        <select name="category_id" id="validationCustom01" class="form-control">
                                                            <option value="" selected="true" disabled>Select</option>
                                                            @foreach($categorys as $category)
                                                                <option value="{{$category->id}}" {{$category->id == $data->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="valid-feedback">
                                                            Done !!
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom01">Sub-Category Name</label>
                                                        <input type="text" class="form-control" id="validationCustom02"
                                                            placeholder="Sub-Category name" name="sub_category_name" value="{{$data->sub_category_name}}" required>
                                                        <div class="valid-feedback">
                                                            Done !!
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom02">Status</label>
                                                        <select name="is_active" id="validationCustom03" class="form-control">
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