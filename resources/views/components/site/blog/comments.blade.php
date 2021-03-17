<div class="mt-14">
    <p class="text-white font-semibold text-lg">{{ count($post->comments->where('status', 'approved')) }} Komentar</p>
</div>

@forelse ($comments as $comment)
    <div class="mt-10">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 rounded-full overflow-hidden">
                @isset($comment->user->media[0])
                    <img src="{{ $comment->user->media[0]->getFullUrl() }}" alt="Foto profil {{ $comment->name }}">
                @else
                    <img src="{{ asset('assets/images/avatar-1.png') }}" alt="{{ $comment->name }}">
                @endisset
            </div>
            <div>
                <div class="flex items-center space-x-3">
                    <span class="text-white font-semibold">
                    @empty($comment->website)
                        {{ $comment->name }}
                    @else
                        <a href="{{ $comment->website }}" rel="nofollow" target="_blank">{{ $comment->name }}</a>
                    @endempty
                </span>
                @if ($post->user_id == $comment->user_id)
                    <span class="bg-dark-blue-400 px-2 rounded-full text-sm text-white font-semibold">Penulis</span>
                @endif
            </div>
            <p class="text-dark-blue-200">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
        </div>
    </div>
    <div style="margin-left: 3.8rem;">
        <span class="text-white">
            {!! nl2br(e($comment->content)) !!}
        </span>
        <p class="mt-3 w-10 text-dark-blue-400 font-semibold cursor-pointer hover:underline">
            <a class="reply-comment" href="#" data-reply-to="{{ $comment->id }}"
                data-reply-to-name="{{ $comment->name }}">Balas</a>
        </p>
    </div>

    @foreach ($comment->replies as $reply)
        <div class="mt-12 ml-16">
            <div class="flex items-center space-x-5">
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    @isset($reply->user->media[0])
                        <img src="{{ $reply->user->media[0]->getFullUrl() }}" alt="Foto profil {{ $reply->name }}">
                    @else
                        <img src="{{ asset('assets/images/avatar-1.png') }}" alt="{{ $reply->name }}">
                    @endisset
                </div>
                <div>
                    <div class="flex items-center space-x-3">
                        <span class="text-white font-semibold">
                            @empty($reply->website)
                                {{ $reply->name }}
                            @else
                                <a href="{{ $reply->website }}" rel="nofollow" target="_blank">{{ $reply->name }}</a>
                            @endempty
                        </span>

                        @if ($post->user_id == $reply->user_id)
                            <span
                                class="bg-dark-blue-400 px-2 rounded-full text-sm text-white font-semibold">Penulis</span>
                        @endif
                    </div>
                    <p class="text-dark-blue-200">{{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}
                    </p>
                </div>
            </div>
            <div class="w-max" style="margin-left: 3.8rem;">
                <p class="text-white">
                    {!! nl2br(e($reply->content)) !!}
                </p>
            </div>
        </div>
    @endforeach
@empty
    <div class="mt-10">
        <div class="flex items-center space-x-3">
            <div>
                <div class="flex items-center space-x-3">
                    <span class="text-white font-semibold">
                        Tidak ada komentar
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-left: 3.8rem;">
        <span class="text-white">
            Belum ada komentar apapun di posting ini. Mengapa tidak menjadi yang pertama?
        </span>
    </div>
@endforelse
