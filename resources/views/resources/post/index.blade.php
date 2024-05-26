<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                <div id="success-alert" class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    // Automatically close the alert after 5 seconds
                    setTimeout(function () {
                        var alert = document.getElementById("success-alert");
                        if (alert) {
                            alert.classList.remove("show");
                            alert.classList.add("d-none");
                        }
                    }, 5000);
                </script>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>{{ __('Post List') }}</h2>
                        <a href="{{ route('post.create') }}" class="btn btn-primary"> <i class="bi bi-file-earmark-plus-fill me-1"></i> Add a New Post </a>
                    </div>
                    <div class="card-body p-5">
                        @if(isset($posts) && $posts->count() > 0)
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->subject }}</td>
                                    <td>{{ $post->post }}</td>
                                    <td>
                                        @if ($post->status == 1)
                                        <span class="badge bg-success" style="font-size: 1.2em">Published</span>
                                        @else
                                        <span class="badge bg-danger" style="font-size: 1.2em">Unpublished</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('post.show', $post) }}" type="button" class="btn btn-dark m-1">
                                            <i class="bi bi-folder-symlink"></i>
                                        </a>
                                        <a href="{{ route('post.edit', $post) }}" type="button" class="btn btn-success m-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- destroy -->
                                        <form action="{{ route('post.destroy', $post) }}" method="post" style="display: inline" onsubmit="return confirmDelete()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1">
                                                <i class="bi bi-trash2-fill"></i>
                                            </button>
                                        </form>
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        @else
                        <p>{{ __('No posts available.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?");
    }
</script>
