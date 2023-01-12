@forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- <td><button type="button" class="btn btn-primary">Delete</button> -->
                    <td>
                        <div class="delete-modal btn  btn-sm" data-id='{{$user->id}}' id="deletecategory1" name='.$user->name.'><i class="fa fa-trash" aria-hidden="true"></i></div>
                    </td>

                    </td>
                </tr>
                <!---- delete model -------------->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ url('/delete') }}">
                                    <input type="hidden" name="userid" id="user_id" value="">
                                    @csrf
                                    <p>Are you Sure you want Delete this user?.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" value="" class="btn btn-info ">Confirm</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="3">There are no users.</td>
                </tr>
                @endforelse