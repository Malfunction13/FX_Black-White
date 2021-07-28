<div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="image_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-section py-1">
            <div class="modal-header">
                <h5 class="modal-title" id="image_modal_label">{{ $post->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="img" class="w-100" src="{{ URL::asset('assets/images/' . $post->img_name) }}" alt="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
