<!-- da-vinchi inspired -->
@extends('layouts.da-vinci') 

@section('title', 'Draft Concept')

@section('nav-actions')
    <a href="{{ route('products.index') }}" class="btn">Return to Gallery</a>
@endsection

@section('content')
    <h2 class="signature-text" style="text-align: center; margin-bottom: 2rem;">Draft New Concept</h2>

    <div class="atelier-form" id="form-container">
        <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Nomenclature (Name)</label>
                <input type="text" value="{{ old('name') }}" class="form-control" placeholder="e.g. Vitruvian Man" name="name">
                @error('name')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Cipher (SKU)</label>
                <input type="text" value="{{ old('sku') }}" class="form-control" placeholder="Unique identifier" name="sku">
                @error('sku')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Value (Price)</label>
                <input type="text" value="{{ old('price') }}" class="form-control" placeholder="0.00 Florins" name="price">
                @error('price')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Observations (Description)</label>
                <textarea placeholder="Notes from the sketchbook..." class="form-control" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Sketch (Image)</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <button type="submit" class="btn">Seal & Submit</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    gsap.from("#form-container", { scale: 0.95, opacity: 0, duration: 1, ease: "power2.out", delay: 0.6 });
</script>
@endpush