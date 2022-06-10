@extends('template')

@section('title')
    Обо мне
@endsection

@section('main-content')
    <div class="d-flex justify-content-center border-common">
        <div class="card text-about container-md">
            <div class="card-body mx-3">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-2">Обо мне</h1>
                <div class="mb-3">
                    <p class="card-text text-about">Donec ac odio tempor orci dapibus ultrices in. Quisque sagittis purus sit amet volutpat consequat mauris nunc. Mattis nunc sed blandit libero volutpat sed. Nulla pharetra diam sit amet nisl. Mauris pharetra
                        et ultrices neque. Adipiscing bibendum est ultricies integer quis auctor elit. Viverra orci sagittis eu volutpat odio facilisis mauris. Quis commodo odio aenean sed adipiscing diam. Habitant morbi tristique senectus et netus et
                        malesuada. Cursus risus at ultrices mi. Vulputate ut pharetra sit amet. Massa sapien faucibus et molestie ac. Leo vel fringilla est ullamcorper. Viverra nibh cras pulvinar mattis nunc sed blandit libero volutpat. Sit amet risus nullam
                        eget.
                    <div class="d-flex justify-content-between">
                        <img src="{{ asset('assets/img/photo.jpg') }}" style="width: 30%;" />
                        <img src="{{ asset('assets/img/aboutMe1.jpg') }}" style="width: 30%;" />
                        <img src="{{ asset('assets/img/photo.jpg') }}" style="width: 30%;" />
                    </div>
                    </p>
                    <p class="card-text text-about">Pretium vulputate sapien nec sagittis aliquam malesuada bibendum. Eros donec ac odio tempor orci dapibus. Non quam lacus suspendisse faucibus interdum posuere lorem ipsum. Ipsum consequat nisl vel pretium.
                        Imperdiet dui accumsan sit amet nulla facilisi. Pulvinar sapien et ligula ullamcorper malesuada. Ac tortor dignissim convallis aenean et tortor at risus viverra. Bibendum neque egestas congue quisque egestas diam. Enim sed faucibus
                        turpis in eu mi bibendum neque egestas. Nunc sed id semper risus in hendrerit gravida rutrum. Diam maecenas sed enim ut sem viverra aliquet eget. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim lobortis. Amet porttitor
                        eget dolor morbi non arcu. Pulvinar elementum integer enim neque volutpat ac tincidunt vitae. Vel eros donec ac odio. Odio aenean sed adipiscing diam.
                    <div class="d-flex justify-content-between">
                        <img src="{{ asset('assets/img/photo.jpg') }}" style="width: 30%;" />
                        <img src="{{ asset('assets/img/aboutMe2.jpg') }}" style="width: 30%;" />
                        <img src="{{ asset('assets/img/photo.jpg') }}" style="width: 30%;" />
                    </div>
                    </p>
                    <p class="card-text text-about">Sagittis vitae et leo duis. Fermentum odio eu feugiat pretium nibh ipsum consequat nisl vel. Nullam ac tortor vitae purus faucibus. Pretium fusce id velit ut tortor pretium viverra suspendisse potenti.
                        Nulla facilisi nullam vehicula ipsum a. Eu feugiat pretium nibh ipsum. Et sollicitudin ac orci phasellus egestas. Amet mattis vulputate enim nulla. Sed risus ultricies tristique nulla aliquet enim tortor. Bibendum neque egestas congue
                        quisque egestas diam in. At urna condimentum mattis pellentesque id nibh.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
