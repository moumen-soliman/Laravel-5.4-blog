 <div class="blog-post">
            <h2 class="blog-post-title">
              <a href="{{ url('posts')}}/{{ $post->id }}" 
                {{ $post->title }}
              </a>
            </h2>
            <p class="blog-post-meta">
              <!-- {{ $post->created_at->toFormattedDateString() }} -->
            {{ Auth::user($post->user)->name }} <!-- to get user name who created the post ** based on App\Post ** -->
            </p>

            {{ $post->body }}
</div>
<!-- /.blog-post -->