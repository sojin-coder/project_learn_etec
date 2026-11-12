<main>
    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" value="{{ old('name') }}" placeholder="title"><br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <input type="number" name="price" value="{{ old('price') }}" placeholder="price"><br>
        @error('price')
            <p>{{ $message }}</p>
        @enderror
        <input type="number" name="qty" value="{{ old('qty') }}" placeholder="qty"><br>
        @error('qty')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="image"><br>
        <img id="preview" width="100px"><br>
        @error('image')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="description">{{ old('description') }}</textarea>

        <button type="submit">submit</button>
        <button type="reset">reset</button>
    </form>
</main>