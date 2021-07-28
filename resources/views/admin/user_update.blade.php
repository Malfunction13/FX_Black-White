<form id="update_form" class="row justify-content-center px-5 d-none" action="{{ route('userUpdate', [$user]) }}" method="POST" >
    @csrf
    {{ method_field('PATCH') }}
    <input type="hidden" name="id" value={{ $user->id }}>
    <div class="col flex-column justify-content-center align-items-center form-section">
        <div class="col pb-5 d-flex justify-content-center"><h4>Update user details</h4></div>
        <div class="col-md-6 ml-auto mr-auto">
            <div class="col">
                <label for="username">Username</label>
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" id="update-username" placeholder="Username" value="{{ $user->username }}" required>
                    @error('username')
                    <div class="text-red mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <label for="email">Email</label>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Your email" value={{ $user->email }}>
                    @error('email')
                    <div class="text-red mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <label for="role">Role</label>
                <div class="mb-3">
                    <select id="update-role" name="role" class="form-control browser-default">
                        <option value=0 {{ ($user->role===0) ? "selected" : "" }}>User</option>
                        <option value=1 {{ ($user->role===1) ? "selected" : "" }}>Moderator</option>
                        <option value=2 {{ ($user->role===2) ? "selected" : "" }}>Administrator</option>
                    </select>
                    @error('role')
                    <div class="text-red mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="col">
                    <label for="subscribed">Subscribed</label>
                    <div class="mb-3">
                        <select id="subscribed" name="subscribed" class="form-control">
                            <option value=0 {{ ($user->subscribed===0) ? "selected" : "" }}>False</option>
                            <option value=1 {{ ($user->subscribed===1) ? "selected" : "" }}>True</option>
                        </select>
                    </div>
                    @error('subscribed')
                    <div class="text-red mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="expiry" >Expiry date</label>
                    <div class="input-group" class="mb-3">
                        <input id="datepicker"  name="expiry_date" type="text" class="form-control" value={{ $user->expiry_date }}>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <input id="update_user" type="submit" value="Submit" class="management-button mt-3">
            </div>
        </div>
    </div>
</form>
