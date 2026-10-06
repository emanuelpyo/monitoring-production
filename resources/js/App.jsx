import ProductionSummary from './components/ProductionSummary';
import LineStatus from './components/LineStatus';
import LiveEvents from './components/LiveEvents';
import RejectAnalysis from './components/RejectAnalysis';
import { useDashboardData } from './hooks';

function App() {
    const {
        summary,
        lines,
        events,
        rejectAnalysis,
        loading,
        error,
    } = useDashboardData();

    if (loading) {
        return (
            <main className="min-h-screen bg-gray-100 p-6">
                <p className="text-gray-600">Loading dashboard...</p>
            </main>
        );
    }

    if (error) {
        return (
            <main className="min-h-screen bg-gray-100 p-6">
                <p className="text-red-600">
                    Failed to load dashboard data.
                </p>
            </main>
        );
    }

    return (
        <main className="min-h-screen bg-gray-100">
            <header className="border-b bg-white">
                <div className="mx-auto max-w-7xl px-6 py-5">
                    <h1 className="text-2xl font-bold text-gray-900">
                        Real-Time Production Monitoring
                    </h1>

                    <p className="mt-1 text-sm text-gray-500">
                        Production overview and live factory status
                    </p>
                </div>
            </header>

            <div className="mx-auto max-w-7xl space-y-6 px-6 py-6">
                <ProductionSummary summary={summary} />

                <LineStatus lines={lines} />

                <div className="grid gap-6 lg:grid-cols-2">
                    <LiveEvents events={events} />
                    <RejectAnalysis data={rejectAnalysis} />
                </div>
            </div>
        </main>
    );
}

export default App;