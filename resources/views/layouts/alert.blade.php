@if(Session::has('success'))
<div class="fixed flex justify-center top-0 right-0 left-0 z-50" id="message" >
    <p class="text-2xl font-bold bg-green-700 text-white px-5 py-2 rounded-b-lg " >{{session('success')}}</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById("message").style.display = "none";
        }, 2000);
    </script>
@endif
