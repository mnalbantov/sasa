<template>
    <div class="ad-item row">
        <!-- item-image -->
        <div class="item-image-box col-sm-4">
            <div class="item-image">
                <a href="details.html"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
            </div><!-- item-image -->
        </div>

        <!-- rending-text -->
        <div class="item-info col-sm-8">
            <!-- ad-info -->
            <div class="ad-info">
                <h3 class="item-price">$ {{ price }}</h3>
                <h4 class="item-title"><a href="#">{{ title }}</a></h4>
                <div class="item-cat">
                    <span><a href="#">{{ body }}</a></span> /
                    <span><a href="#">Tv &amp; Video</a></span>
                </div>
            </div><!-- ad-info -->

            <!-- ad-meta -->
            <div class="ad-meta">
                <div class="meta-content">
                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                    <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                </div>
                <!-- item-info-right -->
                <div class="user-option pull-right">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                    <a class="online" href="#" data-toggle="tooltip" data-placement="top"  title="" data-original-title=""><i class="fa fa-user"></i> </a>
                </div><!-- item-info-right -->
            </div><!-- ad-meta -->
        </div><!-- item-info -->
    </div>
</template>

<script>
    export default {
      data() {
          return {
              title: 'soemthing',
              body : 'something here',
              type: 'Agent',
              price: 500,
          }
      }
    }
</script>