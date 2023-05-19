<script id="masonry-js" type="text/javascript">
              ( function() {
                  var _fireWhenCzrAppAndMasonryReady = function() {
                      jQuery( function($) {
                        var initOnCzrReady = function() {
                            var $grid_container = $('#grid-wrapper.masonry'),
                                masonryReady = $.Deferred(),
                                _debouncedMasonryLayoutRefresh = _.debounce( function(){
                                          if ( masonryActive ) {
                                                $grid_container.masonry( 'layout' );
                                          }
                                }, 200 ),
                                masonryActive = false;

                              if ( 1 > $grid_container.length ) {
                                    czrapp.errorLog('Masonry container does not exist in the DOM.');
                                    return;
                              }
                              $grid_container.on( 'masonry-init.hueman', function() {
                                    masonryReady.resolve();
                              });

                              function isMobile() {
                                    return czrapp.base.matchMedia && czrapp.base.matchMedia(575);
                              }

                              function masonryInit() {
                                    $grid_container.masonry({
                                          itemSelector: '.grid-item',
                                          //to avoid scale transition of the masonry elements when revealed (by masonry.js) after appending
                                          hiddenStyle: { opacity: 0 },
                                          visibleStyle: { opacity: 1 },
                                          isOriginLeft: 'rtl' === $('html').attr('dir') ? false : true
                                    })
                                    //Refresh layout on image loading
                                    .on( 'smartload simple_load', 'img', function(evt) {
                                          //We don't need to refresh the masonry layout for images in containers with fixed aspect ratio
                                          //as they won't alter the items size. These containers are those .grid-item with full-image class
                                          if ( $(this).closest( '.grid-item' ).hasClass( 'full-image' ) ) {
                                                return;
                                          }
                                          _debouncedMasonryLayoutRefresh();
                                    });
                                    masonryActive = true;
                              }

                              function masonryDestroy() {
                                    $grid_container.masonry('destroy');
                                    masonryActive = false;
                              }

                              // If the grids has only 1 column we don't init nor need to bind any masonry code.
                              if ( 1 === 2 ) {
                                    $( '.post-inner', $grid_container ).css( 'opacity', 1 );
                                    masonryActive = false;
                                    masonryReady.resolve();
                              } else {
                                    //Init Masonry on imagesLoaded
                                    //@see https://github.com/desandro/imagesloaded
                                    //
                                    //Even if masonry is not fired, let's emit the event anyway
                                    //It might be listen to !
                                    $grid_container.imagesLoaded( function() {
                                          if ( ! isMobile() ) {
                                                // init Masonry after all images have loaded
                                                masonryInit();
                                          }
                                          //Even if masonry is not fired, let's emit the event anyway
                                          $grid_container.trigger( 'masonry-init.hueman' );
                                    });

                                    czrapp.userXP.isResizing.bind( function( is_resizing ) {
                                          if ( ! is_resizing ) {//resize finished
                                                var _isMobile = isMobile();
                                                if ( _isMobile  && masonryActive ) {
                                                      masonryDestroy();
                                                } else if ( !_isMobile && !masonryActive ) {
                                                      masonryInit();
                                                }
                                          }
                                    });
                              }

                              //Reacts to the infinite post appended
                              czrapp.$_body.on( 'post-load', function( evt, data ) {
                                    var _do = function( evt, data ) {
                                        if( data && data.type && 'success' == data.type && data.collection && data.html ) {
                                              if ( masonryActive ) {
                                                    //get jquery items from the collection which is like

                                                    //[ post-ID1, post-ID2, ..]
                                                    //we grab the jQuery elements with those ids in our $grid_container
                                                    var $_items = $( data.collection.join(), $grid_container );

                                                    if ( $_items.length > 0 ) {
                                                          $_items.imagesLoaded( function() {
                                                                //inform masonry that items have been appended: will also re-layout
                                                                $grid_container.masonry( 'appended', $_items )
                                                                               //fire masonry done passing our data (we'll listen to this to trigger the animation)
                                                                               .trigger( 'masonry.hueman', data );

                                                                setTimeout( function(){
                                                                      //trigger scroll
                                                                      $(window).trigger('scroll.infinity');
                                                                }, 150);
                                                          });
                                                    }
                                              } else {
                                                  //even if masonry is disabled we still need to emit 'masonry.customizr' because listened to by the infinite code to trigger the animation
                                                  //@see pc-pro-bundle/infinite/init-pro-infinite.php
                                                  if ( $.fn.imagesLoaded ) {
                                                      $grid_container.imagesLoaded( function() { $grid_container.trigger( 'masonry.hueman', data ); } );
                                                  } else {
                                                      $grid_container.trigger( 'masonry.hueman', data );
                                                  }
                                              }
                                        }//if data
                                  };
                                  if ( 'resolved' == masonryReady.state() ) {
                                        _do( evt, data );
                                  } else {
                                        masonryReady.then( function() {
                                              _do( evt, data );
                                        });
                                  }
                              });
                        };//initOnCzrReady

                        initOnCzrReady();

                      })//jQuery
                      //czrapp.ready.done( initOnCzrReady );
                  };//_fireWhenCzrAppAndMasonryReady()


                jQuery( function($) {
                      var _fireWhenCzrAppReady = function() {
                          if ( $.fn.masonry ) {
                              _fireWhenCzrAppAndMasonryReady()
                          } else {
                              // if masonry has already be printed, let's listen to the load event
                              var masonry_script_el = document.querySelectorAll('[src*="wp-includes/js/jquery/masonry"]');

                              if ( masonry_script_el[0] ) {
                                  masonry_script_el[0].addEventListener('load', function() {
                                      _fireWhenCzrAppAndMasonryReady();
                                  })
                              }
                      };

                      if ( window.czrapp && czrapp.ready && 'resolved' === czrapp.ready.state() ) {
                            _fireWhenCzrAppReady();
                      } else {
                            document.addEventListener('czrapp-is-ready', _fireWhenCzrAppReady );
                      }
                });//jQuery

              })();
            }
