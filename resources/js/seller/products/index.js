function formStepper() {
    return {
        currentStep: 1,
        steps: [
            {
                title: "Infos Perso",
                image: "https://img.freepik.com/free-vector/we-are-open-concept-illustration_114360-9780.jpg?t=st=1742154306~exp=1742157906~hmac=dd355234208d55016ddf463453c2747e9251d56adac5e6b14ea293739a804d7a&w=740",
            },
            {
                title: "Coordonnées",
                image: "https://img.freepik.com/free-vector/remote-meeting-concept-illustration_114360-4704.jpg?t=st=1742158141~exp=1742161741~hmac=1f5095e06135f5d62ff45330ef7d742cb90cd66246323816f9c1ed03d0ce1618&w=996",
            },
            {
                title: "Réseaux Sociaux",
                image: "https://img.freepik.com/free-vector/marketing-consulting-concept-illustration_114360-9027.jpg?t=st=1742158241~exp=1742161841~hmac=ecb8b109a67b50213d55627785b2d5101af09152f016c99f4ea59d4cec2ffed8&w=996",
            },
            {
                title: "Profil Vendeur",
                image: "https://img.freepik.com/free-vector/group-video-concept-illustration_114360-4792.jpg?t=st=1742158302~exp=1742161902~hmac=7068e5e4907c91e7e2836289bb21e44eac982eb6847e38be585f5eb6dc3730e0&w=996",
            },
            {
                title: "Confirmation",
                image: "https://img.freepik.com/free-vector/collab-concept-illustration_114360-3995.jpg?t=st=1742158333~exp=1742161933~hmac=934088de3598d42b0d10e33a806c12a13d1cd69fdf89578266375d67f8dc7e3d&w=996",
            },
        ],

        formData: {
            name: "",
            last_name: "",
            phone: "",
            address: "",
            facebook: null,
            instagram: null,
            profile_image: null,
        },

        nextStep() {
            if (this.isStepValid(this.currentStep)) {
                this.currentStep++;
                this.$nextTick(() => {
                    if (this.currentStep === 3) {
                        // Étape des réseaux sociaux
                        let facebookInput = document.querySelector(
                            'input[name="facebook"]'
                        );
                        if (facebookInput) {
                            facebookInput.focus();
                        }
                    }
                });
            }
        },

        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    let base64String = e.target.result.replace(/\s/g, "");
                    this.formData.profile_image = base64String;
                };
                reader.readAsDataURL(file);
            }
        },

        prevStep() {
            this.currentStep--;
        },

        isStepValid(step) {
            if (this.formData.address) {
                this.formData.address = this.formData.address
                    .replace(/\n/g, " ")
                    .trim();
            }

            const stepFields = {
                1: ["name", "last_name"],
                2: ["address", "phone"],
                3: ["facebook", "instagram"],
                4: ["profile_image"],
            };

            const fields = stepFields[step] || [];
            return fields.every((field) => {
                if (field === "profile_image") {
                    return (
                        this.formData[field] &&
                        typeof this.formData[field] === "string"
                    );
                }
                return (
                    this.formData[field] && this.formData[field].trim() !== ""
                );
            });
        },

        isFormValid() {
            return (
                this.formData.name.trim() !== "" &&
                this.formData.last_name.trim() !== "" &&
                this.formData.address.trim() !== "" &&
                this.formData.phone.trim() !== ""
            );
        },
        getCurrentField() {
            const fields = ["name", "address", "facebook", "picture"];
            return fields[this.currentStep - 1] || "";
        },
        submitForm() {
            let missingFields = [];

            if (!this.formData.name.trim()) missingFields.push("Nom");
            if (!this.formData.last_name.trim()) missingFields.push("Prénom");
            if (!this.formData.phone.trim()) missingFields.push("Téléphone");
            if (!this.formData.address.trim()) missingFields.push("Adresse");

            if (missingFields.length > 0) {
                // alert("Veuillez remplir les champs suivants : " + missingFields.join(", "));
                return;
            }
        },
    };
}
