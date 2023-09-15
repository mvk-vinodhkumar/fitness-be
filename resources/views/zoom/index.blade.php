
<head>
    <!-- import #zmmtg-root css -->
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/react-select.css" />
<head>
<body>
    <!-- import ZoomMtg dependencies -->
    <script src="https://source.zoom.us/1.9.1/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js"></script>

    <!-- import ZoomMtg -->
    <script src="https://source.zoom.us/zoom-meeting-1.9.1.min.js"></script>
    
    <!-- import local .js file -->
    <!-- <script src="js/index.js"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        // For Local module default:
        // ZoomMtg.setZoomJSLib('node_modules/@zoomus/websdk/dist/lib', '/av');
        // For CDN version default
// ZoomMtg.setZoomJSLib('https://dmogdx0jrul3u.cloudfront.net/1.9.1/lib', '/av');
// For Global use source.zoom.us:
ZoomMtg.setZoomJSLib('https://source.zoom.us/1.9.1/lib', '/av'); 


ZoomMtg.preLoadWasm();
ZoomMtg.prepareJssdk();
const zoomMeeting = document.getElementById("zmmtg-root")
    </script>
     <!-- added on import -->
     <div id="zmmtg-root"></div>
    <div id="aria-notify-area"></div>
     <!-- added on meeting init -->
     <div class="ReactModalPortal"></div>
    <div class="ReactModalPortal"></div>
    <div class="ReactModalPortal"></div>
    <div class="ReactModalPortal"></div>
    <div class="global-pop-up-box"></div>
    <div class="sharer-controlbar-container sharer-controlbar-container--hidden"></div>
</body>
<script>
    $.ajax({
            url:'generate_signature',
            type:'post',
            data:{"_token": "{{ csrf_token() }}"},
            global:true,
            async:false,
            success:function(response){
                ZoomMtg.showMeetingHeader({
                    show: true
                });
                ZoomMtg.init({
                videoHeader:true,
                showMeetingHeader:true,
				leaveUrl: 'https://livezy.com',
				isSupportAV: true,
				success: function() {
					ZoomMtg.join({
                        signature: response,
                        meetingNumber: '85628441979',
                        userName: 'chandan',
                        apiKey: '6jT9oA_oRE6lgcyQkNybcQ',
                        userEmail: 'chandan@livezy.com',
                        success: (success) => {
                            console.log(success)
                        },
                        error: (error) => {
                            console.log(error)
                        }
                    })		
				}
			})
                
            }
        })
    
</script>