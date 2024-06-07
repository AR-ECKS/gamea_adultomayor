<div class="modal fade bd-example-modal-lg" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content modal-blur">
            <div class="modal-header bg-success ">
                <h5 class="modal-title " id="exampleModalLabel" style="color:white">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-3 m-auto">
                            <label for="exampleInputEmail1" class="form-label">Nombre Completo: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" maxlength="35" name="name" value="{{ old('name', $user->name) }}" autofocus oninput="handleInput(this)">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 m-auto">
                            <label for="exampleInputEmail1" class="form-label">Nombre de Usuario: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="username" maxlength="15" placeholder="Nombre de Usuario" value="{{ old('name', $user->username) }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 m-auto">
                            <label for="exampleInputEmail1" class="form-label">Carnet de identidad: </label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" required name="ci"
                                maxlength="20" placeholder="" value="{{ old('name', $user->ci) }}">
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" required name="extension">
                                <option value="" selected disabled>Selecciona una extensión</option>
                                <option value="LP" {{ old('extension') == 'LP' ? 'selected' : '' }}>LP</option>
                                <option value="CB" {{ old('extension') == 'CB' ? 'selected' : '' }}>CB</option>
                                <option value="SC" {{ old('extension') == 'SC' ? 'selected' : '' }}>SC</option>
                                <option value="BE" {{ old('extension') == 'BE' ? 'selected' : '' }}>BE</option>
                                <option value="PD" {{ old('extension') == 'PD' ? 'selected' : '' }}>PD</option>
                                <option value="TJ" {{ old('extension') == 'TJ' ? 'selected' : '' }}>TJ</option>
                                <option value="OR" {{ old('extension') == 'OR' ? 'selected' : '' }}>OR</option>
                                <option value="PT" {{ old('extension') == 'PT' ? 'selected' : '' }}>PT</option>
                                <option value="CH" {{ old('extension') == 'CH' ? 'selected' : '' }}>CH</option>
                            </select>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 m-auto">
                            <label for="exampleInputEmail1" class="form-label">Cargo: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" required name="cargo"
                                maxlength="20" placeholder="" value="{{ old('name', $user->cargo) }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 m-auto">
                            <label for="exampleInputEmail1" class="form-label">Correo Electrónico: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" maxlength="20" placeholder="" value="{{ old('name', $user->email) }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label for="password" class="form-label">Contraseña:</label>
                        </div>
                        <div class="col-md-9 position-relative">
                            <div class="input-group" style="width: 94%;">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            </div>

                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 m-auto">
                            <label for="exampleInputEmail1" class="form-label">Roles:</label>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach ($roles as $id => $role)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $id }}" @if (in_array($id, $user->userRoles)) checked @endif onchange="handleRoleSelection(this)" >
                                        <label class="form-check-label" for="role_{{ $id }}">
                                            <span class="form-check-sign switch">
                                                <span class="check"></span>
                                            </span>{{$role }}</label>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="input-file-container">
                        <div class="input-file">
                            <p class="input-file__name">Cambiar imagen</p>
                            <button type="button" class="input-file__button">
                                <i class="fas fa-upload"></i>
                            </button>
                            <input type="file" class="fileInpt" name="imagen" id="avatarInput">
                        </div>
                        <img src="{{ isset($user->imagen) ? asset('storage/'.$user->imagen) : 'https://i.ibb.co/0Jmshvb/no-image.png' }}" class="rounded img-thumbnail image-preview" alt="preview image">
                    </div>


                    <button type="submit" class="btn btn-success" style="float: right;">Registrar Usuario</button>
                </div>
        </div>
    </div>
</div>
</form>

<script>
        const avatarInput = document.querySelector('#avatarInput');
        const avatarName = document.querySelector('.input-file__name');
        const imagePreview = document.querySelector('.image-preview');

        avatarInput.addEventListener('change', e => {
            let input = e.currentTarget;
            let fileName = input.files[0].name;
            avatarName.innerText = `Archivo: ${fileName}`;

            const fileReader = new FileReader();
            fileReader.addEventListener('load', e => {
                let imageData = e.target.result;
                imagePreview.setAttribute('src', imageData);
            })

            fileReader.readAsDataURL(input.files[0]);
        });

        function handleRoleSelection(checkbox) {
    if (checkbox.checked) {
        // Si se selecciona un rol, deshabilitar los demás
        disableOtherRoles(checkbox);
    } else {
        // Si se deselecciona, habilitar todos los roles
        enableAllRoles();
    }
}

function disableOtherRoles(selectedCheckbox) {
    var checkboxes = document.querySelectorAll('input[name="roles[]"]');
    checkboxes.forEach(function(checkbox) {
        if (checkbox !== selectedCheckbox && checkbox.checked) {
            checkbox.checked = false; // Desmarcar el checkbox
            checkbox.disabled = true;
        }
    });
}

function enableAllRoles() {
    var checkboxes = document.querySelectorAll('input[name="roles[]"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.disabled = false;
    });
}


        function validateInput() {
            var input = document.getElementById('name');
            var inputValue = input.value;

            // Permitir solo letras y espacios
            inputValue = inputValue.replace(/[^a-zA-Z\s]/g, '');



            // Actualizar el valor del campo de entrada
            input.value = inputValue;
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon');

            // Cambiar el tipo de entrada de contraseña a texto y viceversa
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

            // Cambiar el icono del ojo
            eyeIcon.className = passwordInput.type === 'password' ? 'fas fa-eye-slash' : 'fas fa-eye';
        }

        function checkPasswordStrength() {
            var passwordInput = document.getElementById('password');
            var passwordStrengthBar = document.getElementById('password-strength-bar');
            var passwordStrengthText = document.getElementById('password-strength-text');

            // Evaluar la fortaleza de la contraseña
            var strength = 0;
            var regexList = [/[$@$!%*?&#]/, /[A-Z]/, /[0-9]/, /[a-z]/];

            for (var regex of regexList) {
                if (regex.test(passwordInput.value)) {
                    strength++;
                }
            }

            // Mostrar la barra de fortaleza con colores y longitud proporcionales
            passwordStrengthBar.style.width = (strength * 25) + '%';

            if (strength === 0) {
                passwordStrengthBar.style.backgroundColor = '';
                passwordStrengthText.textContent = '';
            } else if (strength <= 2) {
                passwordStrengthBar.style.backgroundColor = 'red';
                passwordStrengthText.textContent = '';
            } else if (strength <= 3) {
                passwordStrengthBar.style.backgroundColor = 'orange';
                passwordStrengthText.textContent = '';
            } else {
                passwordStrengthBar.style.backgroundColor = 'green';
                passwordStrengthText.textContent = '';
            }
        }


        function checkPasswordMatch() {
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('password_confirmation');
            var passwordMatchError = document.getElementById('password-match-error');

            if (passwordInput.value !== confirmPasswordInput.value) {
                passwordMatchError.textContent = 'Las contraseñas no coinciden';
            } else {
                passwordMatchError.textContent = '';
            }
        }

        function togglePasswordVisibilityConfirmation() {
            var passwordConfirmationInput = document.getElementById('password_confirmation');
            var showPasswordConfirmationCheckbox = document.getElementById('showPasswordConfirmation');

            // Cambiar el tipo de entrada de contraseña a texto y viceversa
            passwordConfirmationInput.type = showPasswordConfirmationCheckbox.checked ? 'text' : 'password';
        }

        function handleInput(input) {
            updateUsername(input);
            validateNameInput(input);
        }

        function updateUsername(input) {
            var usernameInput = document.getElementById('username');
            var name = input.value.trim();

            // Obtener las iniciales de cada palabra en el nombre
            var initials = name.split(' ').map(word => word[0].toUpperCase()).join('');

            // Limitar la longitud de las iniciales a 5 caracteres
            if (initials.length > 5) {
                initials = initials.substring(0, 5);
            }

            // Establecer el valor del campo de nombre de usuario
            usernameInput.value = initials + '_';
        }

        function validateNameInput(input) {
            // Expresión regular que solo permite letras y espacios
            var regex = /^[A-Za-z\s]+$/;

            // Obtener el valor del campo de entrada
            var inputValue = input.value;

            // Verificar si el valor cumple con la expresión regular
            if (!regex.test(inputValue)) {
                // Si no cumple, mostrar un mensaje de error
                // alert('Por favor, introduzca solo letras y espacios en el campo de nombre.');
                // Limpiar el valor no válido
                input.value = inputValue.replace(/[^A-Za-z\s]+/, '');
            }
        }
    </script>
