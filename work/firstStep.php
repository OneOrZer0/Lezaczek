<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if($_SESSION['logged']['access']==1&&isset($_SESSION['started'])&&$_SESSION['started']=="started"){

    echo "<h1>Przed rozpoczęciem podaj stan sprzętu plażowego!</h1>";
    
    echo<<<end

      <div class="row noMarg">
        <div class="">
          <div class="col-8 offset-2 noPadd">
            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="row noMarg">
                  <div class="col-6 noPadd">
                    <input type="text" placeholder="Stan leżaków">
                  </div>
                  <div class="col-2 noPadd">
                    /
                  </div>
                  <div class="col-4 noPadd">
                    100
                  </div>
                </div>
              </div>

              <div class="col-12 noPadd">
                <div class="row noMarg">
                  <div class="col-6 noPadd">
                    <input type="text" placeholder="Stan parasoli">
                  </div>
                  <div class="col-2 noPadd">
                    /
                  </div>
                  <div class="col-4 noPadd">
                    100
                  </div>
                </div>
              </div>

              <div class="col-12 noPadd">
                <div class="row noMarg">
                  <div class="col-6 noPadd">
                    <input type="text" placeholder="Stan parawanów">
                  </div>
                  <div class="col-2 noPadd">
                    /
                  </div>
                  <div class="col-4 noPadd">
                    100
                  </div>
                </div>
              </div>
              <div class="col-12 noPadd">
                <button>Potwierdź stan sprzętu</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    end;

  }else{
    header('Location: index.php');
    exit();
  }