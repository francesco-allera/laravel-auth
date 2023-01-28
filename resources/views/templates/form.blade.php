@php
    if (isset($product)) {
        $route = route('product.update', compact('product'));
        $method = 'PUT';
        $action = 'edit';
    } else {
        $route = route('product.store');
        $method = 'POST';
        $action = 'add';
    }
@endphp

<form action="{{ $route }}" method="post">
    @csrf
    @method($method)

    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" placeholder="insert the name"
            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
            value="{{ isset($product) ? $product->name : '' }}">
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" placeholder="insert the description"
            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
            value="{{ isset($product) ? $product->description : '' }}">
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    </div>

    <div class="form-group">
        <label for="price">price</label>
        <input type="text" name="price" placeholder="insert the price"
            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
            value="{{ isset($product) ? $product->price : '' }}">
        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
    </div>

    <div class="form-group">
        <label for="img_url">img_url</label>
        <input type="text" name="img_url" placeholder="insert the img_url"
            class="form-control {{ $errors->has('img_url') ? 'is-invalid' : '' }}"
            value="{{ isset($product) ? $product->img_url : '' }}">
        <div class="invalid-feedback">{{ $errors->first('img_url') }}</div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">{{ $action }} Product</button>
    </div>
</form>
