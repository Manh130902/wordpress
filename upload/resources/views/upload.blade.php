<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
</head>

<body>
    <h2>Upload Files</h2>
    <form action="./upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (isset($fileName))
    <div>
        <a href="{{ asset('uploads/' . $fileName) }}" target="_blank">Xem tệp đã tải lên</a>
    </div>
    @endif

</body>

</html>