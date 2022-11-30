<div class="form-group mb-3">
    <label class='form-label'for="name">Name</label>
    <input required class='form-control' type="text" name="name" id="name"
        value="{{ old('name', optional($user ?? null)->name) }}" placeholder="John Doe" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The name feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>

    @error('name')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>


<div class="form-group mb-3">
    <label class='form-label text-bold' for="email">Email</label>
    {{-- <input required class='form-control ' name="email" id="email"cols="30" rows="10"
        style="resize: none;">{{ old('email', optional($user ?? null)->email) }} /> --}}
    <input required class='form-control' type="email" name="email" id="email"
        value="{{ old('email', optional($user ?? null)->email) }}" placeholder="e.g Apple" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The email feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('email')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label class='form-label text-bold' for="card">Card</label>
    {{-- <textarea required class='form-control ' name="card" id="card"cols="30" rows="10"
        style="resize: none;">{{ old('card', optional($user ?? null)->card) }}</textarea> --}}
    <input required class='form-control' type="number" name="card" id="card"
        value="{{ old('card', optional($user ?? null)->card) }}" placeholder="1234123412341234" />
    <div class="alert alert-danger my-2 p-2 invalid-feedback">The card feild is required</div>
    <div class="alert alert-success my-2 p-2 valid-feedback">Input vaild</div>
    @error('card')
        <div class="alert alert-danger my-2 p-2">{{ $message }}</div>
    @enderror
</div>




{{-- <div class="d-flex justify-content-center"> --}}
<div class="d-grid">
    <button type="submit" class="btn btn-primary btn-block py-2">Submit</button>
</div>
