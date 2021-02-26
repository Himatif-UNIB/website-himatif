<div class="mx-auto items-center justify-center p-2 rounded-lg mt-10">
    <h2 class="px-4 pt-3 pb-2 text-white text-lg">{{ count($post->comments->where('status', 'approved')) }} Komentar</h2>
    @forelse ($comments as $comment)
        @if ($loop->last)
            <div class="mb-2 mt-2 lg:mb-5 p-2 m-2 rounded-md">
            @else
                <div class="mb-2 mt-2 lg:mb-0 p-2 m-2 rounded-md">
        @endif
        <div class="flex items-center">
            <div class="w-14 h-14 rounded-full overflow-hidden">
                @isset($comment->user->media[0])
                    <img class="w-full h-full object-cover object-center" src="{{ $comment->user->media[0]->getFullUrl() }}"
                        alt="Foto profil {{ $comment->name }}">
                @else
                    <img class="w-full h-full object-cover object-center" src="{{ asset('assets/images/avatar-1.png') }}"
                        alt="{{ $comment->name }}">
                @endisset
            </div>
            <div class="ml-4 -mt-3 bg-darkbl">
                <span class="font-semibold text-white">
                @empty($comment->website)
                    {{ $comment->name }}
                @else
                    <a href="{{ $comment->website }}" rel="nofollow" target="_blank">{{ $comment->name }}</a>
                @endempty

                @if ($post->user_id == $comment->user_id)
                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-dark-blue-400 rounded-full ml-3">Penulis</span>
                @endif
            </span>
            <br>
            <span class="text-dark-blue-400">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
        </div>
    </div>
    <div style="margin-left: 4.5rem;" class="">
        <span class="text-white">{!! nl2br(e($comment->content)) !!}</span>
        @if ($comment->parent_id == null)
            <br>
            <br>
            <span class="text-orange-600"><a class="reply-comment" href="#" data-reply-to="{{ $comment->id }}"
                    data-reply-to-name="{{ $comment->name }}">Balas</a></span>
        @endif
    </div>

    @foreach ($comment->replies as $reply)
        @if ($loop->last)
            <div class="mb-2 mt-2 lg:mb-5 p-2 m-2 rounded-md reply ml-20">
            @else
                <div class="mb-2 mt-2 lg:mb-0 p-2 m-2 rounded-md reply ml-20">
        @endif
        <div class="flex items-center">
            <div class="w-14 h-14 rounded-full bg-gray-400 overflow-hidden">
                @isset($reply->user->media[0])
                    <img class="w-full h-full object-cover object-center" src="{{ $reply->user->media[0]->getFullUrl() }}"
                        alt="Foto profil {{ $reply->name }}">
                @else
                    <img class="w-full h-full object-cover object-center" src="{{ asset('assets/images/avatar-1.png') }}"
                        alt="{{ $reply->name }}">
                @endisset
            </div>
            <div class="ml-4 -mt-3">
                <span class="font-semibold text-white">
                @empty($reply->website)
                    {{ $reply->name }}
                @else
                    <a href="{{ $reply->website }}" rel="nofollow" target="_blank">{{ $reply->name }}</a>
                @endempty

                @if ($post->user_id == $reply->user_id)
                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-dark-blue-400 rounded-full ml-3">Penulis</span>
                @endif
            </span>
            <br>
            <span class="text-dark-blue-400">{{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</span>
        </div>
    </div>
    <div style="margin-left: 4.5rem;">
        <span class="text-white">{!! nl2br(e($reply->content)) !!}</span>
    </div>
</div>
@endforeach
</div>
@empty
<div class="mb-2 mt-2 lg:mb-5 p-2 m-2 rounded-md">
    <div class="mb-2 mt-2 lg:mb-0 p-2 rounded-md">
        <div class="flex items-center">
            Belum ada komentar apapun.
            @if (getSetting('allowComment') == true || $post->allowComment == true)
                Mengapa tidak menjadi yang pertama?
            @endif
        </div>
    </div>
</div>
@endforelse
</div>
