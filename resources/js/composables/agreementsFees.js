import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useFees() {
    const AgreementFee = ref([]);
    const agreementsFees = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getAgreementFee = async (id) => {
        let response = await axios.get("/api/agreementsFees/" + id);
        AgreementFee.value = response.data.data;
    };

    const getAgreementsFees = async () => {
        let response = await axios.get("/api/agreementsFees");
        agreementsFees.value = response.data.data;
    };

    const storeAgreementFee = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/agreementsFees", data);
            await router.push({ name: "agreementsFees.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateAgreementFee = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/agreementsFees/" + id, AgreementFee.value);
            await router.push({ name: "agreementsFees.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyAgreementFee = async (id) => {
        await axios.delete("/api/agreementsFees/" + id);
    };

    return {
        agreementsFees,
        getAgreementsFees,
        getAgreementFee,
        storeAgreementFee,
        destroyAgreementFee,
        updateAgreementFee,
        AgreementFee,
        errors,
    };
}
