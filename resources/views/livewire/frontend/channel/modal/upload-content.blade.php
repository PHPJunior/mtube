<x-modal>
    <x-slot name="title">
        <h3 class="text-lg font-medium text-gray-900">{{ __('Upload Contents') }}</h3>
    </x-slot>
    <x-slot name="content">
        <div class="UppyModalOpenerBtn"></div>
        <div class="DashboardContainer"></div>
    </x-slot>
</x-modal>


<script>
    var uppy = Uppy.Core({
        debug: true,
        autoProceed: false,
        restrictions: {
            maxFileSize: 100000000000,
            allowedFileTypes: ['video/*']
        },
        meta: {
            channel: {{ $channel_id }}
        }
    });

    uppy.use(Uppy.Dashboard, {
        trigger: '.UppyModalOpenerBtn',
        inline: true,
        target: '.DashboardContainer',
        metaFields: [
            { id: 'name', name: 'Name', placeholder: 'Name' },
            { id: 'description', name: 'Description', placeholder: 'Description' }
        ],
        height: 500,
        width: '100%',
        browserBackButtonClose: false
    });
    uppy.use(Uppy.Url, {
        target: Uppy.Dashboard,
        companionUrl: '{{ env('UPPY_COMPANION_URL') }}',
    });
    uppy.use(Uppy.Webcam, { target: Uppy.Dashboard, onBeforeSnapshot: () => Promise.resolve(), preferredVideoMimeType: 'video/webm' });
    uppy.use(Uppy.ScreenCapture, { target: Uppy.Dashboard })
    uppy.use(Uppy.Tus, {
        endpoint: '{{ env('APP_URL') }}/tus',
        resume: false,
        autoRetry: true,
        chunkSize: 2000000,
        retryDelays: [0, 1000, 3000, 5000],
        limit: 10
    });

    uppy.on('upload-success', function (file, response) {
        @this.emit('videoUploaded')
    });
</script>
