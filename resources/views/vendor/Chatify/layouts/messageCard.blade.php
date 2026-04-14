<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time'>
        ".($isSender ? "<span class='fas fa-$seenIcon' seen'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
?>

<div class="message-card @if($isSender) mc-sender @endif" data-id="{{ $id }}">
    {{-- Delete Message Button --}}
    @if ($isSender)
        <div class="actions">
            <i class="fas fa-trash delete-btn" data-id="{{ $id }}"></i>
        </div>
    @endif
    {{-- Card --}}
    <div class="message-card-content">
        @if (isset($attachment->type) && $attachment->type != 'image' || isset($message))
            <div class="message">
                {{-- In-Bubble Report Preview --}}
                @if (isset($report))
                    <div class="report-context-preview" style="
                        background: rgba(0,0,0,0.03);
                        border-left: 3px solid #2563eb;
                        padding: 6px 12px;
                        margin: -4px -8px 8px -8px;
                        border-radius: 4px;
                        font-size: 11px;
                        opacity: 0.9;
                    ">
                        <div style="display:flex; align-items:center; gap:6px; margin-bottom:2px;">
                            <svg width="12" height="12" fill="none" stroke="#2563eb" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <b style="color:#2563eb; text-transform:uppercase; letter-spacing:0.02em;">Referensi Laporan #{{ $report->id }}</b>
                        </div>
                        <div style="color: #475569; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $report->nama_fasilitas }}
                        </div>
                    </div>
                @endif

                {!! ($message == null && isset($attachment->file) && $attachment->type != 'file') ? $attachment->title : nl2br($message) !!}
                {!! $timeAndSeen !!}
                {{-- If attachment is a file --}}
                @if(isset($attachment->type) && $attachment->type == 'file')
                <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download">
                    <span class="fas fa-file"></span> {{ $attachment->title }}</a>
                @endif
            </div>
        @endif
        @if(isset($attachment->type) && $attachment->type == 'image')
        <div class="image-wrapper" style="text-align: {{$isSender ? 'end' : 'start'}}">
            <div class="image-file chat-image" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment->file) }}')">
                <div>{{ $attachment->title }}</div>
            </div>
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif
    </div>
</div>
