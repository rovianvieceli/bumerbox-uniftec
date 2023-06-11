inputDate = document.querySelector("input[data-type='date']")
inputCpfcnpj = document.querySelector("input[data-type='cpfcnpj']")
inputCep = document.querySelector("input[data-type='cep']")
inputTelefone = document.querySelector("input[data-type='telefone']")
toastAlert = document.querySelector(".toast")

function eventDataTypeDateInput(e) {
    if (e !== null) {
        e.type = e.value.length ? 'date' : 'text';

        e.addEventListener('focusin', function () {
            this.type = 'date'
        })

        e.addEventListener('focusout', function () {
            this.type = this.value.length ? 'date' : 'text';
        })
    }
}

function eventDataTypeCpfCnpj(e) {
    if (e !== null) {
        e.maxLength = 18;

        e.addEventListener('keypress', function () {
            this.value = this.value.replace(/\D/g, "")
            if (this.value.length <= 10) {
                this.value = this.value.replace(/^(\d{3})(\d)/, "$1.$2")
                this.value = this.value.replace(/^(\d{3})\.(\d{3})(\d)/, "$1.$2.$3")
                this.value = this.value.replace(/\.(\d{3})(\d{1,2})$/, ".$1-$2")
            } else {
                this.value = this.value.replace(/^(\d{2})(\d)/, "$1.$2")
                this.value = this.value.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
                this.value = this.value.replace(/\.(\d{3})(\d)/, ".$1/$2")
                this.value = this.value.replace(/(\d{4})(\d{1,2})$/, "$1-$2")
            }
        })
    }
}

function eventDataTypeCep(e) {
    if (e !== null) {
        e.maxLength = 9;

        e.addEventListener('keypress', function () {
            this.value = this.value.replace(/\D/g, "")
            this.value = this.value.replace(/^(\d{5})(\d{1,3})/, "$1-$2")
        })
    }
}

function eventDataTypeTelefone(e) {
    if (e !== null) {
        e.maxLength = 16;

        e.addEventListener('keypress', function () {
            this.value = this.value.replace(/\D/g, "")
            console.log(this.value)
            if (this.value.length <= 9) {
                this.value = this.value.replace(/^(\d{2})(\d)/, "($1) $2")
                this.value = this.value.replace(/\s(\d{4})(\d{1,4})$/, " $1-$2")
            } else {
                this.value = this.value.replace(/^(\d{2})(\d)(\d{4})(\d{1,4})/, "($1) $2 $3 $4")
            }
        })
    }
}

function eventToastAlert(toastAlert) {
    if (toastAlert) {
        bootstrap.Toast.getOrCreateInstance(toastAlert).show()
    }
}

eventDataTypeDateInput(inputDate)
eventDataTypeCpfCnpj(inputCpfcnpj)
eventDataTypeCep(inputCep)
eventDataTypeTelefone(inputTelefone)
eventToastAlert(toastAlert)
