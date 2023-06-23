import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useFees() {
    const Agreement = ref([]);
    const agreements = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getAgreement = async (id) => {
        let response = await axios.get("/api/agreements/" + id);
        Agreement.value = response.data.data;
    };

    const getAgreements = async () => {
        let response = await axios.get("/api/agreements");
        agreements.value = response.data.data;
    };

    const storeAgreement = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/agreements", data);
            await router.push({ name: "agreements.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateAgreement = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/agreements/" + id, Agreement.value);
            await router.push({ name: "agreements.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyAgreement = async (id) => {
        await axios.delete("/api/agreements/" + id);
    };

    return {
        agreements,
        getAgreements,
        getAgreement,
        storeAgreement,
        destroyAgreement,
        updateAgreement,
        Agreement,
        errors,
    };
}
