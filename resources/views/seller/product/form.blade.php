<div class="form-group mb-3">
   <label for="title">Product Title</label>
   <input type="text" class="form-control" id="title"
      placeholder="Enter Product Name" name="title" value="{{old('title',$data->title)}}" required>
</div>
<div class="form-group mb-3">
   <label for="description">Product Description</label>
   <textarea cols="30" rows="10" name="description" id="description" class="form-control">{{old('description',$data->description)}}</textarea>
</div>
<div class="form-group mb-3">
   <label for="tags">Product Tag</label>
   <input type="text" class="form-control" id="tags"
      placeholder="Enter Product Tag using Commas(,)" name="tags" value="{{old('tags',$data->tags)}}" required>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Wrap Count</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-4">
            <label for="color_1">Wrap Count (A)</label>
            <select name="wrap_count_A" id="wrap_count_A" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($WrapCounts as $WrapCount)
                  <option value="{{$WrapCount->id}}" {{$WrapCount->id == $data->wrap_count_A ? 'selected' : ''}}>{{$WrapCount->wrap_count}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-4">
            <label for="color_2">Wrap Count (B)</label>
            <select name="wrap_count_B" id="wrap_count_B" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($WrapCounts as $WrapCount)
                  <option value="{{$WrapCount->id}}" {{$WrapCount->id == $data->wrap_count_B ? 'selected' : ''}}>{{$WrapCount->wrap_count}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-4">
            <label for="color_3">Wrap Count (C)</label>
            <select name="wrap_count_C" id="wrap_count_C" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($WrapCounts as $WrapCount)
                  <option value="{{$WrapCount->id}}" {{$WrapCount->id == $data->wrap_count_C ? 'selected' : ''}}>{{$WrapCount->wrap_count}}</option>
               @endforeach
            </select>
         </div>
      </div>
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Weft Count</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-4">
            <label for="color_1">Weft Count (A)</label>
            <select name="weft_count_A" id="weft_count_A" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($WeftCounts as $WeftCount)
                  <option value="{{$WeftCount->id}}" {{$WeftCount->id == $data->weft_count_A ? 'selected' : ''}}>{{$WeftCount->weft_count}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-4">
            <label for="color_2">Weft Count (B)</label>
            <select name="weft_count_B" id="weft_count_B" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($WeftCounts as $WeftCount)
                  <option value="{{$WeftCount->id}}" {{$WeftCount->id == $data->weft_count_B ? 'selected' : ''}}>{{$WeftCount->weft_count}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-4">
            <label for="color_3">Weft Count (C)</label>
            <select name="weft_count_C" id="weft_count_C" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($WeftCounts as $WeftCount)
                  <option value="{{$WeftCount->id}}" {{$WeftCount->id == $data->weft_count_C ? 'selected' : ''}}>{{$WeftCount->weft_count}}</option>
               @endforeach
            </select>
         </div>
      </div>
   </div>
</div>
<div class="row" style="margin-top:22px;">
   <div class="col-lg-6">
      <label for="weave">Reed</label>
      <input type="number" name="reed" value="{{old('reed',$data->reed)}}" class="form-control">
   </div>
   <div class="col-lg-6">
      <label for="category">Pick</label>
      <input type="number" name="pick" value="{{old('pick',$data->pick)}}" class="form-control">
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Width</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-4">
            <label for="meter">Inch</label>
            <input name="width_inch" value="{{old('width_inch',$data->width_inch)}}" type="number" class="form-control" onkeyup="calculateCM(this.value)">
         </div>
         <div class="col-lg-4">
            <label for="yard">CM</label>
            <input name="width_cm" id="width_cm" value="{{old('yard',$data->width_cm)}}" type="number" class="form-control" readonly>
         </div>
      </div>
   </div>
</div>
<div class="row" style="margin-top:22px;">
   <div class="col-lg-4">
      <label for="weave">Weave</label>
      <select name="weave" id="weave" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         @foreach($weaves as $weave)
            <option value="{{$weave->id}}" {{$weave->id == $data->weave ? 'selected' : ''}}>{{$weave->weave_name}}</option>
         @endforeach
      </select>
   </div>
   <div class="col-lg-4">
      <label for="category">Category</label>
      <select name="category" id="category" class="form-control" onchange="findSubcategory(this.value)">
         <option value="" selected="true" disabled>Select</option>
         @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == $data->category ? 'selected' : ''}}>{{$category->category_name}}</option>
         @endforeach
      </select>
   </div>
   <div class="col-lg-4">
      <label for="subcategory">Sub-Category</label>
      <div id="subcategory">
         <input type="text"  class="form-control" readonly>
      </div>
   </div>
</div>
<div class="row" style="margin-top:22px;">
   <div class="col-lg-4">
      <label for="gsm">GSM</label>
      <input type="number" name="gsm" id="gsm" value="{{old('gsm',$data->gsm)}}" class="form-control">
   </div>
   <div class="col-lg-4">
      <label for="trade_name">Trade Name</label>
      <select name="trade_name" id="trade_name" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         @foreach($tadeNames as $tadeName)
            <option value="{{$tadeName->id}}" {{$tadeName->id == $data->trade_name ? 'selected' : ''}}>{{$tadeName->trade_name}}</option>
         @endforeach
      </select>
   </div>
   <div class="col-lg-4">
      <label for="finish">Finish</label>
      <select name="finish" id="finish" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         @foreach($finishes as $finish)
            <option value="{{$finish->id}}" {{$finish->id == $data->finish ? 'selected' : ''}}>{{$finish->finish_name}}</option>
         @endforeach
      </select>
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
<input type="hidden" name="old_image_1" value="{{$data->image_1}}">
<input type="hidden" name="old_image_2" value="{{$data->image_2}}">
<input type="hidden" name="old_image_3" value="{{$data->image_3}}">
   <div class="panel-heading">Image</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-12">
            <label for="image_1">Image 1</label> <small style="color:red;">( * Primary Image )</small>
            <input name="image_1" type="file" value="{{old('image_1')}}" class="form-control">
         </div>
      </div>
      <div class="row" style="margin-top:22px;">
         <div class="col-lg-12">
             <label for="image_2">Image 2</label>
            <input name="image_2" type="file" value="{{old('image_2')}}" class="form-control">
         </div>
      </div>
      <div class="row" style="margin-top:22px;">
         <div class="col-lg-12">
            <label for="image_3">Image 3</label>
            <input name="image_3" type="file" value="{{old('image_3')}}" class="form-control">
         </div>
      </div>
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Color</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-6">
            <label for="color_1">Color 1</label>
            <select name="color_1" id="color_1" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($colors as $color)
                  <option value="{{$color->id}}" {{$color->id == $data->color_1 ? 'selected' : ''}}>{{$color->color_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-6">
            <label for="color_2">Color 2</label>
            <select name="color_2" id="color_2" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($colors as $color)
                  <option value="{{$color->id}}" {{$color->id == $data->color_2 ? 'selected' : ''}}>{{$color->color_name}}</option>
               @endforeach
            </select>
         </div>
      </div>
      <div class="row" style="margin-top:20px;">
         <div class="col-lg-6">
            <label for="color_3">Color 3</label>
            <select name="color_3" id="color_3" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($colors as $color)
                  <option value="{{$color->id}}" {{$color->id == $data->color_3 ? 'selected' : ''}}>{{$color->color_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-6">
            <label for="color_4">Color 4</label>
            <select name="color_4" id="color_4" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($colors as $color)
                  <option value="{{$color->id}}" {{$color->id == $data->color_4 ? 'selected' : ''}}>{{$color->color_name}}</option>
               @endforeach
            </select>
         </div>
      </div>
      <div class="row" style="margin-top:20px;">
         <div class="col-lg-6">
            <label for="color_5">Color 5</label>
            <select name="color_5" id="color_5" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($colors as $color)
                  <option value="{{$color->id}}" {{$color->id == $data->color_5 ? 'selected' : ''}}>{{$color->color_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-6">
            <label for="color_6">Color 6</label>
            <select name="color_6" id="color_6" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($colors as $color)
                  <option value="{{$color->id}}" {{$color->id == $data->color_6 ? 'selected' : ''}}>{{$color->color_name}}</option>
               @endforeach
            </select>
         </div>
      </div>
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Blend Content</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-4">
            <label for="blend_1">Blend Content 1</label>
            <select name="blend_1" id="blend_1" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($blendContents as $blendContent)
                  <option value="{{$blendContent->id}}" {{$blendContent->id == $data->blend_1 ? 'selected' : ''}}>{{$blendContent->blend_content_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-2">
            <label for="percentage_1">Percentage(%)</label>
            <input name="percentage_1" id="percentage_1" value="{{old('percentage_1',$data->percentage_1)}}" type="number" class="form-control">
         </div>
      </div>
      <div class="row" style="margin-top:20px;">
         <div class="col-lg-4">
            <label for="blend_2">Blend Content 2</label>
            <select name="blend_2" id="blend_2" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($blendContents as $blendContent)
                  <option value="{{$blendContent->id}}" {{$blendContent->id == $data->blend_2 ? 'selected' : ''}}>{{$blendContent->blend_content_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-2">
            <label for="percentage_2">Percentage(%)</label>
            <input name="percentage_2" id="percentage_2" value="{{old('percentage_2',$data->percentage_2)}}" type="number" class="form-control">
         </div>
      </div>
      <div class="row" style="margin-top:20px;">
         <div class="col-lg-4">
            <label for="blend_3">Blend Content 3</label>
            <select name="blend_3" id="blend_3" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($blendContents as $blendContent)
                  <option value="{{$blendContent->id}}" {{$blendContent->id == $data->blend_3 ? 'selected' : ''}}>{{$blendContent->blend_content_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-2">
            <label for="percentage_3">Percentage(%)</label>
            <input name="percentage_3" id="percentage_3" value="{{old('percentage_3',$data->percentage_3)}}" type="number" class="form-control">
         </div>
      </div>
      <div class="row" style="margin-top:20px;">
         <div class="col-lg-4">
            <label for="blend_4">Blend Content 4</label>
            <select name="blend_4" id="blend_4" class="form-control">
               <option value="" selected="true" disabled>Select</option>
               @foreach($blendContents as $blendContent)
                  <option value="{{$blendContent->id}}"  {{$blendContent->id == $data->blend_4 ? 'selected' : ''}}>{{$blendContent->blend_content_name}}</option>
               @endforeach
            </select>
         </div>
         <div class="col-lg-2">
            <label for="percentage_4">Percentage(%)</label>
            <input name="percentage_4" id="percentage_4" value="{{old('percentage_4',$data->percentage_4)}}" type="number" class="form-control">
         </div>
      </div>
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Quantity</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-4">
            <label for="meter">Meter</label>
            <input name="meter" value="{{old('meter',$data->meter)}}" type="number" class="form-control" onkeyup="calculateYard(this.value)">
         </div>
         <div class="col-lg-4">
            <label for="yard">Yard</label>
            <input name="yard" id="yard" value="{{old('yard',$data->yard)}}" type="number" class="form-control" readonly>
         </div>
      </div>
   </div>
</div>
<div class="panel panel-default" style="margin-top:30px;">
   <div class="panel-heading">Price</div>
   <div class="panel-body">
   @foreach($quantities as $key => $quantity)
      <div class="row">
      <div class="col-lg-4">
         <label for="quantity">Quantity</label>
         <input type="text" class="form-control" readonly value="{{$quantity->quantity}}">
         <input type="hidden" name="quantity[]" value="{{$quantity->id}}">
      </div>
         <div class="col-lg-4">
            <label for="inr">{{$SellerCountry->currency}}</label>
            <input type="hidden" name="price_id[]" value="{{@$product_price[$key]->id}}">
            <input name="price[]" type="number"  value="{{@$product_price[$key]->price}}" class="form-control">
         </div>
      </div>
   @endforeach
   </div>
</div>
<div class="row" style="margin-top:22px;">
   <div class="col-lg-4">
      <label for="moq">Minimum (moq)</label>
      <input name="moq" value="{{old('moq',$data->moq)}}" type="number" class="form-control">
   </div>
   <div class="col-lg-4">
      <label for="certificate">Certificate</label>
      <select name="certificate" id="certificate" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         @foreach($certificaties as $certificate)
            <option value="{{$certificate->id}}" {{$certificate->id == $data->certificate ? 'selected' : ''}}>{{$certificate->certificate_name}}</option>
         @endforeach
      </select>
   </div>
   <div class="col-lg-4">
      <label for="insception">Inspection</label>
      <select name="insception" id="insception" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         <option value="1" {{$data->insception == '1' ? 'selected' : ''}}>Yes</option>
         <option value="0" {{$data->insception == '0' ? 'selected' : ''}}>No</option>
      </select>
   </div>
</div>
<div class="row" style="margin-top:22px;margin-bottom:20px;">
   <div class="col-lg-4">
      <label for="test">Test</label>
      <select name="test" id="test" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         <option value="1" {{$data->test == '1' ? 'selected' : ''}}>Yes</option>
         <option value="0" {{$data->test == '0' ? 'selected' : ''}}>No</option>
      </select>
   </div>
   <div class="col-lg-4">
      <label for="location">Location of Goods</label>
      <select name="location" id="location" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         <option value="1" {{$data->location == '1' ? 'selected' : ''}}>Delhi</option>
      </select>
   </div>
   <div class="col-lg-4">
      <label for="country">Country</label>
      <select name="country" id="country" class="form-control">
         <option value="" selected="true" disabled>Select</option>
         <option value="1" {{$data->country == '1' ? 'selected' : ''}}>India</option>
      </select>
   </div>
</div>
<button class="btn btn-primary" type="button" onclick="checkBlend()">Submit form</button>
<br>
<p id="warning" style="color:red;margin-top:5px;"></p>