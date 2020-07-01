<div id="content">

    <h1>Users</h1>
    <hr>
    <div class="row ">


        <?php $x = 0;foreach ($myDB as $key => $value) : ?>



            <div class="card m-1 " style="background-color: #c0cbc36b; width:48%;">


                <div class="card-header text-center" style="background-color: #c0cbc3;">
                    <h1 class="display-6 m-0"><?php echo $value['username']; ?></h1>
                </div>
                <div class="card-body d-blck text-center">
                    <div>
                        <img src="avatars/<?php echo $value['avatar'] ?>" alt="" class="rounded-circle img-thumbnail" width="80px">
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#model<?php echo $x;?>">
                        View Profile
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="model<?php echo $x?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Viewing <?php echo $value['username']; ?> Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p class="font-weight-bolder m-1 text-light">Firstname:<span class="badge badge-pill badge-light ml-1"><?php echo $value['firstname']; ?></span></p>
                                        <p class="font-weight-bolder m-1 text-light">Lastname:<span class="badge badge-pill badge-light ml-1"><?php echo $value['lastname']; ?></span></p>
                                        <p class="font-weight-bolder m-1 text-light">Age:<span class="badge badge-pill badge-light ml-1"><?php echo $value['age']; ?></span></p>
                                        <p class="font-weight-bolder m-1 text-light">Gender:<span class="badge badge-pill badge-light ml-1"><?php echo $value['gender']; ?></span></p>
                                        <p class="font-weight-bolder m-1 text-light">Posts:<span class="badge badge-pill badge-light ml-1"><?php echo $value['posts']; ?></span></p>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        <?php $x++; endforeach ?></div>
</div>

<div class="cleaner"></div>
</div><!-- end of content wrapper -->
<div id="content_wrapper_bottom"></div>