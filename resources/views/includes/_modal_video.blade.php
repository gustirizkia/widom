<div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="modalVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <div class="modal-body">
                @php
                    preg_match(
                        '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                        $videoYtb->content,
                        $match,
                    );
                    $youtube_id = $match[1];
                @endphp


                <div class="ratio ratio-16x9">
                    <iframe src="{{ "https://www.youtube.com/embed/$youtube_id" }}" allowfullscreen></iframe>
                </div>

            </div>

        </div>
    </div>
</div>
