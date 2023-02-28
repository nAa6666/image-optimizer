<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        @php if(session()->has('success')) $success = session()->get('success'); @endphp
        @if(isset($success))
            <div style="background: green;">{{ $success }}</div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div style="background: red;">{{ $error }}</div>
            @endforeach
        @endif

        <label for="formFile">Image</label>
        <input type="file" id="formFile" name="image" required>
        <button type="submit" class="btn btn-dark">Upload</button>
    </div>
</form>
