import { useEffect, useState } from "react";
import api from "./services/api";

export function useDashboardData() {
    const [summary, setSummary] = useState(null);
    const [lines, setLines] = useState([]);
    const [events, setEvents] = useState([]);
    const [rejectAnalysis, setRejectAnalysis] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const fetchDashboardData = async () => {
        try {
            setError(null);

            const [
                summaryResponse,
                linesResponse,
                eventsResponse,
                rejectResponse,
            ] = await Promise.all([
                api.get("/production-summary"),
                api.get("/production-lines"),
                api.get("/production-events/recent?limit=20"),
                api.get("/reject-analysis"),
            ]);

            setSummary(summaryResponse.data);
            setLines(linesResponse.data.data);
            setEvents(eventsResponse.data.data);
            setRejectAnalysis(rejectResponse.data.data);
        } catch (err) {
            setError(err);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchDashboardData();
    }, []);

    return {
        summary,
        lines,
        events,
        rejectAnalysis,
        loading,
        error,
        refresh: fetchDashboardData,
    };
}
