import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useValidityConcepts() {
    const validity_concept = ref([]);
    const validity_concepts = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getValidityConcept = async (id) => {
        let response = await axios.get("/api/validity_concepts/" + id);
        validity_concept.value = response.data.data;
    };

    const getValidityConcepts = async () => {
        let response = await axios.get("/api/validity_concepts");
        validity_concepts.value = response.data.data;
    };

    const storeValidityConcept = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/validity_concepts", data);
            await router.push({ name: "validity_concepts.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateValidityConcept = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/validity_concepts/" + id, validity_concept.value);
            await router.push({ name: "validity_concepts.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyValidityConcept = async (id) => {
        await axios.delete("/api/validity_concepts/" + id);
    };

    return {
        validity_concepts,
        getValidityConcepts,
        getValidityConcept,
        storeValidityConcept,
        destroyValidityConcept,
        updateValidityConcept,
        validity_concept,
        errors,
    };
}
