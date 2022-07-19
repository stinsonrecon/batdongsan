<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/732f1c5837.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/frontend/hidden.js') }}"></script>
    <script src="{{ asset('js/frontend/myScript.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/frontend/myStyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Document</title>
</head>
<body>
    <form class=" w-10/12 rounded px-8 pt-6 pb-8 mb-4 flex justify-between" method="POST"
    action="{{ route('test.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-3 text-center">
            <label class="block text-sm font-bold mb-3" style="color: #696969; font-family: Raleway;">
                Ảnh chứng minh thư mặt trước
            </label>
            <div class="flex justify-center items-center">
                <div class="relative h-40 rounded-lg border-dashed border-2 border-black flex justify-center items-center hover:cursor-pointer w-5/6">
                    <div class="absolute" id="ssn_front_container">
                        <div class="flex flex-col items-center ">
                            <i class="fas fa-cloud-upload-alt fa-3x text-gray-300"></i>
                            <span class="block text-gray-400 font-normal">
                                Attach you files here
                            </span>
                            <span class="block text-gray-400 font-normal">
                                or
                            </span>
                            <span class="block text-blue-400 font-normal">
                                Browse files
                            </span>
                        </div>
                    </div>
                    <input class="h-full w-full opacity-0" id="SSN_front" name="SSN_front" type="file"
                        onchange="ssn_front_select()">
                </div>
            </div>
        </div>

        <script src="{{ asset('js/ssnFrontPreview.js') }}"></script>

        <button class="border rounded-xl mb-10 text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
            Đăng tin
        </button>
    </form>
</body>
</html>
