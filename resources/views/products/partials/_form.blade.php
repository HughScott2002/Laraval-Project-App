<div class="form-group mb-3">
    <label class='form-label'for="name">Name</label>
    <input required class='form-control' type="text" name="name" id="name"
        value="{{ old('name', optional($product ?? null)->name) }}" placeholder="e.g Iphone 14 Pro Max" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The name feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>

    @error('name')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label class='form-label text-bold' for="thumbnail">Image</label>
    <input class='form-control' type="file" name="thumbnail" id="thumbnail" multiple />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">Please Upload a file</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('thumbnail')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label class='form-label text-bold' for="manufacturer">Manufacturer</label>
    {{-- <input required class='form-control ' name="manufacturer" id="manufacturer"cols="30" rows="10"
        style="resize: none;">{{ old('manufacturer', optional($product ?? null)->manufacturer) }} /> --}}
    <input required class='form-control' type="text" name="manufacturer" id="manufacturer"
        value="{{ old('manufacturer', optional($product ?? null)->manufacturer) }}" placeholder="e.g Apple" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The manufacturer feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('manufacturer')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label class='form-label text-bold' for="type">Type</label>
    {{-- <textarea required class='form-control ' name="type" id="type"cols="30" rows="10"
        style="resize: none;">{{ old('type', optional($product ?? null)->type) }}</textarea> --}}
    <input required class='form-control' type="text" name="type" id="type"
        value="{{ old('type', optional($product ?? null)->type) }}" placeholder="e.g Phone" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The type feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('type')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-3">
    <label class='form-label text-bold' for="quantity">Amount</label>
    {{-- <textarea required class='form-control ' name="quantity" id="quantity"cols="30" rows="10"
        style="resize: none;">{{ old('quantity', optional($product ?? null)->quantity) }}</textarea> --}}
    <input required class='form-control' type="number" name="quantity" id="quantity"
        value="{{ old('quantity', optional($product ?? null)->quantity) }}" placeholder="e.g 9" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The amount feild is required</div>
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The amount feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('quantity')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-3">
    <label class='form-label text-bold' for="discount">Discount</label>
    {{-- <textarea required class='form-control ' name="discount" id="discount"cols="30" rows="10"
        style="resize: none;">{{ old('discount', optional($product ?? null)->discount) }}</textarea> --}}
    <input required class='form-control' type="number" step="0.01" name="discount" id="discount" max="99"
        value="{{ old('discount', optional($product ?? null)->discount) }}" placeholder="e.g 3.34%" value="0.00" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The Discount feild is required</div>
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The Discount feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('discount')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-3">
    <label class='form-label text-bold' for="price_range">Price</label>
    {{-- <textarea required class='form-control ' name="price_range" id="price_range"cols="30" rows="10"
        style="resize: none;">{{ old('price_range', optional($product ?? null)->price_range) }}</textarea> --}}
    <input required class='form-control' type="number" step="0.01" name="price_range" id="price_range"
        value="{{ old('price_range', optional($product ?? null)->price_range) }}" placeholder="e.g 9.99" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The price_range feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('price_range')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>


{{-- <div class="d-flex justify-content-center"> --}}
<div class="d-grid">
    <button type="submit" class="btn btn-primary btn-block py-2">Submit</button>
</div>
