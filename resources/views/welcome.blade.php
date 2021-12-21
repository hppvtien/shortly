<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>

<body>
    <h1>Test affilia444te{{ env('API_URL'), 'test' }}</h1>
	<input type="button" name="myBtn" onClick="GetLocalIPAddress()" value="GetIp">
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
<script>
    var url_string = window.location.href;
	var url = new URL(url_string);
	var asmid = url.searchParams.get("asmid");
	if(asmid != null){
		var formData = { asmid: asmid };
		if(sessionStorage.getItem('key_check') != asmid){
			$.ajax({
			type: "POST",
			url: "http://127.0.0.1:8000/page_view",
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			sessionStorage.setItem('key_check', data.asmid);
			});
		}
	}
</script>

</html>