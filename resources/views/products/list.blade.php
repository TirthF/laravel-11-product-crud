@extends('layouts.da-vinci')

@section('title', 'Gallery')

@section('nav-actions')
    <a href="{{ route('products.create') }}" class="btn">New Canvas</a>
@endsection

@section('content')
    <h2 class="signature-text" style="text-align: center; margin-bottom: 3rem;">The Masterpieces</h2>

    @if (Session::has('success'))
        <div class="atelier-alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="gallery-grid">
        @if ($products->isNotEmpty())
            @foreach ($products as $product)
                <div class="portrait-card">
                    <div class="portrait-frame">
                        @if ($product->image)
                            <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="portrait-img">
                        @else
                            <div class="portrait-no-img">Sketch</div>
                        @endif
                    </div>
                    <div class="portrait-info">
                        <h3 class="portrait-title">{{ $product->name }}</h3>
                        <span class="portrait-sku">SKU: {{ $product->sku }}</span>
                        <p class="portrait-desc">{{ $product->description }}</p>
                    </div>
                    <div class="portrait-footer">
                        <span class="portrait-price">${{ number_format($product->price, 2) }}</span>
                        <div class="portrait-actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="action-link">Refine</a>
                            <a href="javascript:void(0);" onclick="deleteProduct({{ $product->id }});" class="action-link action-link-danger">Erase</a>
                            <form id="delete-product-from-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="post" class="d-none" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-gallery">
                <h2>The canvas is blank.</h2>
                <p style="color: var(--clr-text-muted); font-family: var(--font-roman); margin-top: 1rem;">Begin your first masterpiece.</p>
                <a href="{{ route('products.create') }}" class="btn" style="margin-top: 2rem;">Draft Concept</a>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    function deleteProduct(id) {
        if (confirm("Are you certain you wish to erase this masterpiece? This action cannot be undone.")) {
            document.getElementById("delete-product-from-" + id).submit();
        }
    }

    // Staggered reveal for gallery items
    gsap.from(".portrait-card", {
        y: 50, 
        opacity: 0, 
        duration: 1, 
        stagger: 0.15,
        ease: "power2.out",
        scrollTrigger: {
            trigger: ".gallery-grid",
            start: "top 80%"
        }
    });
</script>
@endpush