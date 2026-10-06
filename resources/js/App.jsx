import ProductionSummary from './components/ProductionSummary';
import LineStatus from './components/LineStatus';
import LiveEvents from './components/LiveEvents';
import RejectAnalysis from './components/RejectAnalysis';

function App() {
    return (
        <main>
            <h1>Real-Time Production Monitoring</h1>

            <ProductionSummary />
            <LineStatus />
            <LiveEvents />
            <RejectAnalysis />
        </main>
    );
}

export default App;