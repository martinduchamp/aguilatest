import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useRoutes() {
    const route = ref([]);
    const routes = ref([]);
    const errors = ref("");
    const router = useRouter();

    const getRoute = async (id) => {
        let response = await axios.get("/api/routes/" + id);
        route.value = response.data.data;
    };

    const getRoutes = async () => {
        let response = await axios.get("/api/routes");
        routes.value = response.data.data;
    };

    const storeRoute = async (data) => {
        errors.value = "";
        try {
            await axios.post("/api/routes", data);
            await router.push({ name: "routes.index" });
        } catch (e) {
            console.log(e);
            if (e.response.status == 422) {
                errors.value = e;
            }
        }
    };

    const updateRoute = async (id) => {
        errors.value = "";
        try {
            await axios.put("/api/routes/" + id, route.value);
            await router.push({ name: "routes.index" });
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors;
            }
        }
    };

    const destroyRoute = async (id) => {
        await axios.delete("/api/routes/" + id);
    };

    return {
        routes,
        getRoutes,
        getRoute,
        storeRoute,
        destroyRoute,
        updateRoute,
        route,
        errors,
    };
}
